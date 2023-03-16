<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'group_name',
        'about',
        'active',
    ];
    
    
    public function members()
    {
        return $this->hasMany(GroupMember::class);
    }

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function totalMembers($id) {
        return GroupMember::whereGroupId($id)->count();
    }

    public function getProfilePic($id) {
        $lawyer =  Lawyer::whereUserId($id)->first();
        return $lawyer->profile_pic;
    }

    public function unseenMsg($groupId) {
        $unseenMsg = ChatNotification::where([
            'to_user' => auth()->user()->id,
            'group_id' => $groupId,
            'seen'  => 0
        ])->count();

        return $unseenMsg;
    }

    public function getLatestGroupMsg($groupId) {
        $latestMsg = GroupMessages::whereGroupId($groupId)->latest()->first();
        return $latestMsg ? $latestMsg->body : '-';
    }

    public function getLatestGroupMsgDate($groupId) {
        $latestMsg = GroupMessages::whereGroupId($groupId)->latest()->first();
        return $latestMsg ? $latestMsg->created_at->diffForHumans() : null;
    }

    public function lastPost($groupId) {
        $groupPost = Post::whereGroupId($groupId)
        ->latest()
        ->first();

        return $groupPost ? $groupPost->created_at->diffForHumans() : "No Posts Yet";
    }

    public function getMembers($groupId) {
        $members = GroupMember::whereGroupId($groupId)->get();
        $mem = [];
        foreach($members as $k => $member) {
            $mem[] = $member->member->name;
        }
        return implode(', ', $mem);
    }
}
