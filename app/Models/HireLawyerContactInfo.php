<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireLawyerContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'dob',
        'comments_for_lawyer',
    ];
}
