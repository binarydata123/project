<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class ForumController extends Controller
{
    public function index($status) {
        if($status != 2) {
            $forums = Forum::whereIsVerified($status)
                ->orderBy('updated_at', 'DESC')
                ->paginate(3);
        }else {
            $forums = Forum::onlyTrashed()
            ->where(
                'deleted_at', '>=', Carbon::now()->firstOfMonth()->toDateTimeString()
            )
            ->orderBy('updated_at', 'DESC')
            ->paginate(3);
        }
        return view('admin.forums.index', compact('forums'));
    }

    public function changeForumStatus(Request $request, $forumId) {
        $status = $request->status == 0 ? 1 : 0;
        // print_r($status);exit;
        $verify = Forum::withTrashed()
            ->whereId($forumId)
            ->first();
        $verify->is_verified = $status;
        if($verify->deleted_at) {
            $verify->deleted_at = null;
        }
        $verify->save();
        $htmlPart = (string) view('admin.forums.mail',  compact('verify'));  
        if($status == 1) {
            $mail_data = [
                'subject' => $verify->title,
                'htmlPart' => $htmlPart,
                'lawyer' => $verify->toLawyer ? $verify->toLawyer->email : null,
            ];

            $job = (new \App\Jobs\SendForumEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);
        }
        
        return "success";
    }

    public function forums($status) {
        if($status != 2) {
            $forums = Forum::whereIsVerified($status)
                ->orderBy('updated_at', 'DESC')
                ->paginate(3);
        }else {
            $forums = Forum::onlyTrashed()
            ->where(
                'deleted_at', '>=', Carbon::now()->firstOfMonth()->toDateTimeString()
            )
            ->orderBy('updated_at', 'DESC')
            ->paginate(3);
        }
        $result = (string) view('admin.forums.filter.forum',  compact('forums'));        
        return $result;
    }

    public function forumModal($forumId) {
        $forum = Forum::withTrashed()
            ->whereId($forumId)
            ->first();
        return view('admin.forums.modal-view', ['forum' => $forum])->render();
    }

    public function addTitle(Request $request, $id) {
        $title = $request->title;
        $status = $request->status ?? 0;
        Forum::updateOrCreate(['id' => $id],
        [
            'title' => $title,
            'slug' => Str::slug($title)
        ]);

        return redirect()->route('admin.forums', $status)->with('success','Title added successfully!');
    }

    public function editTitle($id) {
        $forumTitle = Forum::whereId($id)->first();
        $result = (string) view('admin.forums.edit-title',  compact('forumTitle'));        
        return $result;
    }

    public function updateTitle(Request $request, $id) {
        Forum::updateOrCreate(['id' => $id],
        [
            'title' => $request->title,
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('admin.forums', 0)->with('success','Title updated successfully!');
    }

    public function delete($id) {
        $delete = Forum::findOrFail($id);
        $delete->is_verified = 0;
        $delete->delete();

        return redirect()->route('admin.forums', 2)->with('success','Forum deleted successfully!');
    }
    
}
