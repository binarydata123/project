<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'uuid',
        'days_slot_id',
        'payment_id',
        'topic',
        'start_date_time',
        'end_date_time',
        'duration',
        'agenda',
        'start_url',
        'join_url',
        'password',
    ];

    public function payment() {
        return $this->belongsTo(SchduledMeeting::class, 'payment_id');
    }

    public function daysSlot() {
        return $this->belongsTo(DaysSlot::class, 'days_slot_id');
    }
}
