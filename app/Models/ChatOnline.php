<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatOnline extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
        'lawyer_id',
        'status',
        'complete',
        'any', //Any lawyer if user is not selected lawyer
        'reminder'
    ];

    public function lawyer() {
        return $this->belongsTo(Lawyer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function latestMsg($userId) {
        $latest = ChMessage::where('from_id', auth()->user()->id)
                ->where('to_id', $userId)
                ->orWhere('from_id', $userId)
                ->where('to_id', auth()->user()->id)
                ->latest()
                ->first();
        if($latest && strlen($latest->body) > 10) {
            return substr($latest->body, 0, 10).'...';
        }else {
            return $latest ? substr($latest->body, 0, 10) : '-';
        }
        return null;
    } 

    public function latestMsgCreatedAt($userId) {
        $latest = ChMessage::where('from_id', auth()->user()->id)
                ->where('to_id', $userId)
                ->orWhere('from_id', $userId)
                ->where('to_id', auth()->user()->id)
                ->latest()
                ->first();
        return $latest ? date('g:i A', strtotime($latest->created_at)) : '';
    } 

    public function unSeenMsgCount($userId) {
        return ChMessage::where([
            'from_id' => $userId,
            'to_id'   => auth()->user()->id,
            'seen'    => 0
        ])
        ->count();
    }
}
