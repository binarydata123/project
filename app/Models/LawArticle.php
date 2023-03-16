<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'descr',
        'image',
        'added_by',
    ];

    public function category() {
        return $this->belongsTo(LawCategory::class, 'category_id');
    }

    public function addedBy() {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function getProfilePic($id) {
        $lawyer =  Lawyer::whereUserId($id)->first();
        return $lawyer->profile_pic;
    }
}
