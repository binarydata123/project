<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_id',
        'group_id',
        'body',
        'seen',
        'attachment'
    ];

    protected $casts = [
        // 'attachment' => 'json',
    ];

    public function getColor() {
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
        return $color;
    }

    public function fromUser() {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }


}
