<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChatOnline;
use Illuminate\Http\Request;

class ChatRequestController extends Controller
{
    public function chatRequests() {
        $chatRqsts = ChatOnline::all();
        return view('admin.chat-request.index', compact('chatRqsts'));
    }
    
    public function filteredChatRequest($status) { //0 = Pending, 1 = Accepted, 2 = Completed
        if($status == 2) {
            $chatRqsts = ChatOnline::whereComplete(1)->get();
        }else {
            $chatRqsts = ChatOnline::where([
                'status'   => $status,
                'complete' => 0
            ])->get();
        }
        return view('admin.chat-request.index', compact('chatRqsts'));
    }
}
