<?php

namespace App\Http\Controllers\Lawyer;

use App\Events\PostComment;
use App\Http\Controllers\Controller;
use App\Models\ChatNotification;
use App\Models\ChatOnline;
use App\Models\ChMessage;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function chatWithUser($userId) {
        $user = User::whereId($userId)->first();        
        $messages = Chatify::fetchMessagesQuery($userId)->orderBy('created_at', 'ASC')->get();
        $incompletedChatRequests = $this->incompletedChatRqsts();
        return view('lawyer.pages.chat.user', compact('user', 'messages', 'incompletedChatRequests'));
    }

    public function incompletedChatRqsts() {
        return ChatOnline::where([
            'lawyer_id' => auth()->user()->getLawyerId(auth()->user()->id),
            'status'    => 1,
            'complete'  => 0
        ])->get(); 
    }

    public function sendMsg(Request $request, $toId) {
        $messageID = mt_rand(9, 999999999) + time();
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;
        // if there is attachment [file]
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
            Log::info($file);
            // check file size
            if ($file->getSize() < Chatify::getMaxUploadSize()) {
                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File size you are trying to upload is too large!";
            }
        }
        if (!$error->status) {
            $chat = Chatify::newMessage([
                'id' => $messageID,
                'type' => 'user',
                'from_id' => auth()->user()->id,
                'to_id' => $toId,
                'body' =>  $request['msg'] ? htmlentities(trim($request['msg']), ENT_QUOTES, 'UTF-8') : 'file',
                'attachment' => ($attachment) ? json_encode((object)[
                    'new_name' => $attachment,
                    'old_name' => $attachment_title ? htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8') : '',
                ]) : null,
            ]);
            
            // $this->attachedPdf($chat, $request);
            // fetch message to send it with the response
            $messageData = Chatify::fetchMessage($messageID);

            // send to user using pusher
            Chatify::push('private-chatify', 'messaging', [
                'from_id' => auth()->user()->id,
                'to_id' => $toId,
                'message' => Chatify::messageCard($messageData, 'default')
            ]);

            ChatNotification::create([
                'to_user'       => $toId,
                'from_user'     => auth()->user()->id,
                'msg'           => htmlentities(trim($request['msg']), ENT_QUOTES, 'UTF-8')
            ]);

            event(new PostComment($messageID, 'endUserMsg'));
        }else {
            return redirect()->back();
        }
    }

    public function userLatestMsg(Request $request) {
        $msgId = $request->data;
        // $message = ChMessage::whereId($msgId['postComment'])->first();
        $getUserId = Chatify::getUserId($msgId['postComment']);
        $message = $this->getLatestMsg($getUserId->to_id);
        Log::info("=========");
        Log::info($message);
        Log::info("=======");
        $attachment = null;
        if($message) {
            if($message->attachment) {
                $attachment = json_decode($message->attachment);                                                           
            }
        }
        $latestMsg = (string) view('common.pages.chat.latest-chat',  compact('message', 'attachment'));        
        return $latestMsg;
    }

    public function latestUsrMsg($toId) {
        $message = $this->getLatestMsg($toId);
        $attachment = null;
        if($message) {
            if($message->attachment) {
                $attachment = json_decode($message->attachment);                                                           
            }
        }
        $latestMsg = (string) view('common.pages.chat.latest-user-chat',  compact('message', 'attachment'));        
        return $latestMsg;
    }

    public function getLatestMsg($userId) {
        return ChMessage::where('from_id', auth()->user()->id)
        ->where('to_id', $userId)
        ->orWhere('from_id', $userId)
        ->where('to_id', auth()->user()->id)
        ->latest()
        ->first();
    }
    
}
