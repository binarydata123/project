<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\ChatOnline;
use App\Models\Forum;
use App\Models\Payment;
use App\Models\RequestQuote;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function userActivty() {
        $requestForQuotes = RequestQuote::whereRequestedBy(auth()->user()->id)->get();
        foreach($requestForQuotes as $k => $quote) {
            $isPaymentDone = Payment::where([
                'lawyer_service_id' => $quote->lawyer_service_id,
                'hired_by'          => auth()->user()->id,
                'payment_status'    => "Payment complete."
            ])->first();
            if($isPaymentDone) {
                $quote->delete();
            }
        }
        $requestForQuotes = RequestQuote::whereRequestedBy(auth()->user()->id)->get();
        $chatRequests = ChatOnline::whereUserId(auth()->user()->id)->get();
        $forumQuestions = Forum::whereEmail(auth()->user()->email)->get();
        $callbackRequests = Callback::whereEmail(auth()->user()->email)->get();
        $hiredData = Payment::whereHiredBy(auth()->user()->id)->get();
        return view('common.my-activity.index', compact('chatRequests', 'forumQuestions', 'requestForQuotes', 'callbackRequests', 'hiredData'));
    }
}
