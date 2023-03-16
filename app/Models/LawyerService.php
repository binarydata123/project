<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'lawyer_id',
        'lawyer_fee',
        'platform_fee',
    ];

    public function services() {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function getLawyerFee($id) {
        $lawService = LawyerService::whereServiceId($id)->first();
        return $lawService ? $lawService->lawyer_fee : null;
    }

    public function getPlatformFee($id) {
        $lawService = LawyerService::whereServiceId($id)->first();
        return $lawService ? $lawService->platform_fee : null;
    }

    public function user() {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function getProfilePic($userId)  {
        return Lawyer::whereUserId($userId)->value('profile_pic');
    }

    public function getEmirate($userId)  {
        return Lawyer::whereUserId($userId)->value('emirates');
    }
}
