<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'slot_id',
        'day',
        'slot_start_time',
        'slot_end_time',
        'amount',
    ];

    public function slot() {
        return $this->belongsTo(Slot::class, 'slot_id');
    }

    public function isAvailable($id, $day) {
        $day = strtolower($day).'_slot';
        $available = Slot::where([
            'id' => $id,
            $day => 1
        ])->first();
        
        return $available ? true : false;
    }

    public function getPlatformFee($daysSlotId, $lawyerId) {
        $getSlot = DaysSlot::whereId($daysSlotId)->first();
        if(str_contains($getSlot->slot_start_time, "am")) {
            $startTime = str_replace("am", "", $getSlot->slot_start_time);
        }else {            
            $startTime = str_replace("pm", "", $getSlot->slot_start_time);
        }
        $endTime = $getSlot->slot_end_time;
        if(str_contains($endTime, "am")) {
            $endTime = str_replace("am", "", $endTime);
        }else {            
            $endTime = str_replace("pm", "", $endTime);
        }
        $duration = $this->getDuration($getSlot->created_at->format('Y-m-d'), $startTime, $endTime);
        $column = $duration == 15 ? 'fifteen' : 'thirty';
        $platformFee = SlotFees::whereLawyerId($lawyerId)->first();
        return $platformFee->$column;
    }

    public function getDuration($date, $startTime, $endTime) {
        $time1 = new DateTime($date.' '.$startTime.':00');
        $time2 = new DateTime($date.' '.$endTime.':00');
        $duration = $time1->diff($time2);
        return (int) $duration->format('%i');
    }
}
