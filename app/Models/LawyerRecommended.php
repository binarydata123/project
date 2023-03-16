<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerRecommended extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_service_id'
    ];
}
