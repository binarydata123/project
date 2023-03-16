<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_service_id',
        'requested_by'
    ];

    public function lawyerService() {
        return $this->belongsTo(LawyerService::class, 'lawyer_service_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'requested_by');
    }
}
