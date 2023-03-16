<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_service_id',
        'hired_by',
        'payment_status',
        'payment_id',
    ];

    public function lawyerService() {
        return $this->belongsTo(LawyerService::class, 'lawyer_service_id');
    }

    public function hiredBy() {
        return $this->belongsTo(User::class, 'hired_by');
    }
}
