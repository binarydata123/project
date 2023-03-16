<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_id',
        'rated_by',
        'rate',
        'comment',
        'is_verified',
    ];

    public function answer() {
        return $this->belongsTo(ForumAnswers::class, 'answer_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'rated_by');
    }
}
