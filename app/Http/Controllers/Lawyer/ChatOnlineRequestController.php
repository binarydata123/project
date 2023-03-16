<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\ChatOnline;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class ChatOnlineRequestController extends Controller
{
    public function requests() {
        $lawyer = Lawyer::whereUserId(auth()->user()->id)->first();
        $onlineRequests = ChatOnline::whereLawyerId($lawyer->id)->get();
        $ids = [];
        foreach($onlineRequests as $k => $request) {
            $ids[] = $request->id;
        }
        $chatRequestsForAllLawyers = ChatOnline::where([
            'any'    => 1,
            'status' => 0
        ])->get();
       
        foreach($chatRequestsForAllLawyers as $k => $request) {
            $ids[] = $request->id;
        }
        
        $chatRequests = ChatOnline::whereIn('id', $ids)->paginate(10);
        // return view('lawyer.chat-online', compact('onlineRequests'));
        return view('lawyer.pages.chat-online-requests', compact('chatRequests'));
    }

    public function acceptRequest(Request $request, $id) {
        $lawyer = Lawyer::whereUserId(auth()->user()->id)->first();
        $isAcceptedAlready = ChatOnline::whereId($id)->first();
        if($isAcceptedAlready->status != 1) {
            $chatRequest = ChatOnline::updateOrCreate(['id' => $id],
            [
                'status'    => 1,
                'lawyer_id' => $lawyer->id
            ]);
    
            $mail_data = [
                'subject' => "Your chat request has been accepted",
                'htmlPart' => "Dear user. Your chat request has been accepted and you have 2 hours to clarify your queries",
                'user_email' => $chatRequest->user->email
                // 'user_email' => "s4shamma@gmail.com"
            ];
    
            $job = (new \App\Jobs\SendOnlineChatRequestEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);
            return "success";
        }

        return "error";

    }

    public function completeRequest(Request $request, $id) {
        $chat = ChatOnline::updateOrCreate(['id' => $id],
        [
            'complete' => 1
        ]);

        $mail_data = [
            'subject' => "Your chat request has been completed",
            'htmlPart' => "Dear user. Your chat request has been completed",
            'user_email' => $chat->user->email
            // 'user_email' => "s4shamma@gmail.com"
        ];

        $job = (new \App\Jobs\ChatRequestCompleted($mail_data))
                ->delay(now()->addSeconds(2)); 

        dispatch($job);

        return "success";
    }
}
