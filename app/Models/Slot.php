<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_id',
        'monday_slot',
        'tuesday_slot',
        'wednesday_slot',
        'thursday_slot',
        'friday_slot',
        'saturday_slot',
        'sunday_slot',
        'title',
        'description',
    ];

    public function lawyer() {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function isActive($lawyerId=null) {
        $lawyerId = $lawyerId ?? auth()->user()->id;
        $slotFee = SlotFees::whereLawyerId($lawyerId)->first();
        if($slotFee && $slotFee->fifteen > 0 && $slotFee->thirty > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function getSessionAmount($session, $lawyerId) {
        $column = $session == 15 ? "fifteen" : "thirty";
        $fees = SlotFees::whereLawyerId($lawyerId)->first();
        return $fees ? $fees->$column : 0;
    }
}
