<?php

namespace App\Http\Controllers;

use App\Models\LawyerService;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class StripeController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function index()
    {
        return view('payment');
    }

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName'      => 'required',
            'cardNumber'    => 'required',
            'month'         => 'required',
            'year'          => 'required',
            'cvv'           => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('service.lawyers', $request->serviceId)->with('danger', $validator->errors()->first());
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            return redirect()->route('service.lawyers', $request->serviceId)->with('danger', $token['error']);
        }
        if (empty($token['id'])) {
            return redirect()->route('service.lawyers', $request->serviceId)->with('danger', 'Payment Failed');
        }

        $charge = $this->createCharge($token['id'], $request->amount);
        
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $payment = Payment::create([
                'lawyer_service_id' => $request->serviceId,
                'hired_by'          => auth()->user()->id,
                'payment_id'        => $charge->id,
                'payment_status'    => $charge->outcome->seller_message
            ]);

            $mail_data = [
                'subject' => "Hired by user",
                'htmlPart' => "You are hired by user: ". auth()->user()->name. " for the service: ".$payment->lawyerService->services->title,
                'lawyer' => $payment->lawyerService->user->email,
            ];

            $job = (new \App\Jobs\SendHiredEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);

            return redirect()->route('service.lawyers', $request->serviceId)->with('success', "Payment Completed");
        } else {
            return redirect()->route('service.lawyers', $request->serviceId)->with('danger', "Payment Failed");
        }
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}