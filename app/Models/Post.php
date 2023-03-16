<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'title',
        'description',
        'slug',
        'file',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function getLawyerProfilePic($id) {
        $lawyer = Lawyer::whereUserId($id)->first();
        return $lawyer->profile_pic;
    }

    public function getCountOfComments($id) {
        return Comment::wherePostId($id)->count();
    }

    public function getComments($id) {
        return Comment::wherePostId($id)->orderBy('created_at', 'DESC')->get();
    }
}
