<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotFees extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_id',
        'fifteen', //15 minute session
        'thirty',  //30 minute session
    ];

    public function lawyer() {
        return $this->belongsTo(User::class, 'lawyer_id');
    }
}
