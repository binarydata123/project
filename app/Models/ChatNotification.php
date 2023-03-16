<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ChatNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'to_user',
        'from_user',
        'is_group',
        'group_id',
        'seen',
        'closed',
        'msg',
    ];

    public function toUser() {
        return $this->belongsTo(User::class, 'to_user');
    }

    public function fromUser() {
        return $this->belongsTo(User::class, 'from_user');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function getDateDescription($date) {
        $now = Carbon::now();
        $created = Carbon::parse($date);
        $diffDays = $created->diffInDays($now);
    
        if ($diffDays == 0) {
            return 'today';
        } else if ($diffDays == 1) {
            return 'yesterday';
        } else if ($diffDays <= 31) {
            return $diffDays . ' days ago';
        } else {
            return $created->format('M d, Y');
        }
    }
}
