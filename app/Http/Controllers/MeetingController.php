<?php

namespace App\Http\Controllers;

use App\Models\DaysSlot;
use App\Models\Product;
use App\Models\SchduledMeeting;
use App\Models\User;
use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    // private $stripe;
    public function __construct() {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

    public function store()
    {
        $data = [];
        $data['topic']      = "Testing Topic";
        $data['start_time'] = "2022-10-03";
        $data['duration'] = 15;
        $data['agenda'] = "Testing Agenda";
        $data['host_video'] = 1;
        $data['participant_video'] = 1;
        $this->create($data);
        // $this->create($request->all());

        // return redirect()->route('meetings.index');
        return redirect()->route('home');
    }

    public function update($meeting, Request $request)
    {
        $this->update($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }

    public function scheduleMeeting(Request $request) {
        // dd($request->all());
        $isAlreadyCreated = Product::whereProductName($request->product_name)->first();
        if(!$isAlreadyCreated) {
            $product = $this->stripe->products->create([
                'name' => $request->product_name,
            ]);
    
            $prodData = Product::create([
                'product_name' => $request->product_name,
                'product_id'   => $product->id
            ]);
            $amt = (int)filter_var($request->amount, FILTER_SANITIZE_NUMBER_INT);
            $price = $this->stripe->prices->create([
                'unit_amount' => $amt * 100,
                'currency' => 'aed',
                'product' => $product->id,
            ]);
              
            $priceData = Product::findOrFail($prodData->id);
            $priceData->price_id = $price->id;
            $priceData->save();

        }

        // \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
        // $domain = 'http://127.0.0.1:8000';
        $domain = 'https://dev.test.connectlegal.ae';

        $checkoutSession = $this->stripe->checkout->sessions->create([
            'line_items' => [[
              'price' => $isAlreadyCreated ? $isAlreadyCreated->price_id : $priceData->price_id,
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $domain . '/dashboard',
            'cancel_url' => $domain . '/how-it-works',
        ]);

        SchduledMeeting::create([
            'days_slot_id'      => $request->daySlotId,
            'scheduled_by'      => auth()->user()->id,
            'lawyer_id'         => $request->lawyerUserId,
            'checkout_id'       => $checkoutSession->id
        ]);

        session(['checkoutId' => $checkoutSession->id, 'date' => $request->date]);
        return Redirect::to($checkoutSession->url);
    }
}