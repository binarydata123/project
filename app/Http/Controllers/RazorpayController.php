<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Str;

class RazorpayController extends Controller
{
    public function index()
    {        
        return view('razorpayView');
    }
  
    public function store(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $amount = intval($request->amount) * 100;
        $purpose = 'Connect Legal Invoice Payment';

        $payload = array(
            "type" => "link",
            "view_less" => 1,
            "amount" => $amount,
            "currency" => "USD",
            "description" => $purpose,
            "receipt" => "RPORDER" . Str::random(9),
            "sms_notify" => 1,
            "email_notify" => 1,
            "expire_by" => strtotime("+1 month"),
            "callback_url" => url('/razorpay/payments/success'),
            "callback_method" => "get",
            "customer" => array(
                "name" => auth()->user()->name,
                "email" => auth()->user()->email
            ),
        );
        
        $invoice  = $api->invoice->create($payload);
        $invoice = $invoice->toArray();

        if ($invoice['status'] == 'issued') {
            Payment::insert([
                'amount' => $amount,
                'purpose' => $purpose,
                'payment_request_id' => $invoice['id'],
                'payment_link' => $invoice['short_url'],
                'payment_status' => $invoice['status'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            header('Location: ' . $invoice['short_url']);
            exit();
        } else {
            echo "<pre>";
            print_r($invoice);
            exit;
        }
    }

    public function success(Request $request) {
        $request_data = $request->all();

        $invoice_id = $request_data['razorpay_invoice_id'];
        $invoice_status = $request_data['razorpay_invoice_status'];
        $payment_id = $request_data['razorpay_payment_id'];
        
        $rp_payment = Payment::where('payment_request_id', $invoice_id)->first();
        
        if (strtolower(trim($invoice_status)) == 'paid') {
            $rp_payment->payment_status = $invoice_status;
            $rp_payment->payment_id = $payment_id;
            $rp_payment->save();
            dd('Payment Successful');
        } else {
            dd('Payment Failed!');
        }
        dd($request_data);
    }
}
