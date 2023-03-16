<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'message',
        'to_lawyer',
    ];

    public function lawyer() {
        return $this->belongsTo(User::class, 'to_lawyer');
    }
}
