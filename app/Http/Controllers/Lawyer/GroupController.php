<?php

namespace App\Http\Controllers\Lawyer;

use Alert;
use App\Events\PostComment;
use App\Http\Controllers\Controller;
use App\Models\ChatNotification;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\GroupMessages;
use App\Models\Lawyer;
use App\Models\Post;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class GroupController extends Controller
{
    public function groups($sort = null) {
        // sort = asc
        $sort2 = 'desc';
        if(!$sort) {
            $sort = "desc";
        }else {
            if($sort === "desc2" || $sort === "asc2") {
                $sort2 = $sort === "desc2" ? "desc" : "asc";
                $sort = "desc";
            }
        }

        $user = auth()->user();
        $groupsByMe = Group::whereAdminId($user->id)
        ->orderBy('updated_at', $sort)
        ->paginate(4, '*', 'groups-created-by-me');
        
        $groupsIamIn = GroupMember::whereMemberId($user->id)
        ->orderBy('updated_at', $sort2)
        ->paginate(2, '*', 'groups-im-in');
        
        $lawyers = Lawyer::where([
            ['user_id', '!=', $user->id],
            ['is_verified', 1]
        ])->get();

        // return view('lawyer.community.groups.index', compact('groupsByMe', 'groupsIamIn', 'lawyers'));
        return view('lawyer.pages.community.groups.list', compact('groupsByMe', 'groupsIamIn', 'lawyers', 'sort', 'sort2'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'group'     => 'required',   
            'about'     => 'required',
            'lawyers'   => 'required|array|min:1'
        ]);

        if($validator->fails()) {
            Alert::error('Error', 'Please go back to the form to view the errors');
            return redirect()->route('lawyer.community.groups')->withErrors($validator);
        }else {
            $group = Group::create([
                'admin_id'      => auth()->user()->id,
                'group_name'    => $request->group,
                'about'         => $request->about,
            ]);
    
            foreach($request->lawyers as $k => $lawyer) {
                GroupMember::create([
                    'group_id'  => $group->id,
                    'member_id' => $lawyer
                ]);
            }
            Alert::success('Success', 'Created group successfully');
            return redirect()->route('lawyer.community.groups');
        }

    }

    public function groupFeed($groupId) {
        // check user part of this group
        $user = auth()->user();
        $isPartOfGroup = GroupMember::where([
            'member_id' => $user->id,
            'group_id' => $groupId,
        ])->first();
        $isAdmin = Group::whereAdminId($user->id)->first();

        if($isPartOfGroup || $isAdmin) {
            $posts = Post::whereGroupId($groupId)
            ->orderBy('created_at', 'DESC')
            ->get();
            $group = Group::whereId($groupId)->first();
            $groupName = $group->group_name;
            return view('lawyer.community.groups.feed', compact('posts', 'groupId', 'groupName'));
        }else {
            return view('lawyer.layouts.group-error');
        }
    }

    public function storeGroupPost(Request $request, $groupId) {
        $this->validate(request(), [
            'title'   => 'required|unique:posts',   
        ]);

        $post = Post::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'description'   => $request->description,
            'group_id'      => $groupId,
            'slug'          => Str::slug($request->title)
        ]);
        event(new PostComment($post->slug, 'groupPost'));
        Alert::success('Success', 'Your post has been successfully added');
        return redirect()->route('lawyer.community.group.feed', $groupId);
    }

    public function groupChat($groupId) {
        $groupMembers = GroupMember::whereGroupId($groupId)->get();
        $groupDetail = Group::whereId($groupId)->first();
        $messages = GroupMessages::whereGroupId($groupId)->get();
        
        $allGroups = Group::whereIn('id', function ($query) {
            // Find groups the user is a member of
            $query->select('group_id')
                ->from('group_members')
                ->where('member_id', '=', auth()->user()->id);
        })
        ->orWhere('admin_id', '=', auth()->user()->id)
        ->withCount(['members as member_count'])
        ->with(['members' => function ($query) {
            // Fetch group members for each group
            $query->where('member_id', '=', auth()->user()->id);
        }])
        ->get();
        
        return view('lawyer.community.groups.chat', compact('groupMembers', 'groupId', 'groupDetail', 'messages', 'allGroups'));
    }

    public function sendGroupMessage(Request $request, $groupId) {
        $msg = $request->msg ?? 'file';
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
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
        $message = GroupMessages::create([
            'from_id'       => auth()->user()->id,
            'body'          => $msg,
            'group_id'      => $groupId,
            'attachment'    => ($attachment) ? json_encode((object)[
                'new_name' => $attachment,
                'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
            ]) : null,
        ]);
        event(new PostComment($message->id, 'groupMessage'));     

        $groupMembers = GroupMember::whereGroupId($groupId)->get();
        $adminId = null;
        foreach($groupMembers as $k => $member) {
            $adminId = $member->group->admin_id;
            if($member->member_id != auth()->user()->id) {
                ChatNotification::create([
                    'is_group'      => true,
                    'group_id'      => $groupId,
                    'to_user'       => $member->member_id,
                    'from_user'     => auth()->user()->id,
                    'msg'           => $msg
                ]);
            }
        }
        // To Admin
        if($adminId != auth()->user()->id) {
            ChatNotification::create([
                'is_group'      => true,
                'group_id'      => $groupId,
                'to_user'       => $adminId,
                'from_user'     => auth()->user()->id,
                'msg'           => $msg
            ]);
        }

        return true;
    }

    public function getLatestGroupMsg(Request $request) {
        $msgId = $request->data;
        $message = GroupMessages::whereId($msgId['postComment'])->first();
        $attachment = null;
        if($message->attachment) {
            $attachment = json_decode($message->attachment);                                                           
        }
        $latestMsg = (string) view('lawyer.community.groups.latest-chat',  compact('message', 'attachment'));        
        return $latestMsg;
    }

    public function aboutGroup($groupId) {
        $group = Group::whereId($groupId)->first();
        return view('lawyer.community.groups.about', compact('group', 'groupId'));
    }

    public function makeSeen(Request $request) {
        // make as seen
        $isTrue = GroupMessages::where([
            ['group_id', $request->id],
            ['seen', 0]
        ])->first();
        if(!$isTrue) {
            return 1;
        }
        // send the response
        $seen = GroupMessages::where([
            ['group_id', $request->id],
            ['seen', 0],
            ['from_id', '!=', auth()->user()->id]
        ])
        ->update(['seen' => 1]);
        
        return 0;
    }
}
