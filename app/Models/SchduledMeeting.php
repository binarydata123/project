<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchduledMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'days_slot_id',
        'scheduled_by',
        'lawyer_id',
        'zoom_id',
        'payment_id',
        'service_id',
        'checkout_id', //From Stripe
    ];

    public function daysSlot() {
        return $this->belongsTo(DaysSlot::class, 'days_slot_id');
    }

    public function service() {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function scheduledBy() {
        return $this->belongsTo(User::class, 'scheduled_by');
    }

    public function lawyer() {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function zoom() {
        return $this->belongsTo(Zoom::class, 'zoom_id');
    }

    public function getSessionAmount($session, $lawyerId) {
        $column = $session == 15 ? "fifteen" : "thirty";
        $fees = SlotFees::whereLawyerId($lawyerId)->first();
        return $fees ? $fees->$column : 0;
    }

    public function getTotalAmount($lawyerId, $serviceId) {
        $getTotalAmount = LawyerService::where([
            'lawyer_id' => $lawyerId,
            'service_id' => $serviceId
        ])->first();

        return $getTotalAmount->lawyer_fee + $getTotalAmount->platform_fee;
    }
}
