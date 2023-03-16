<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Lawyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_pic',
        'law_firm_name',
        'law_firm_website',
        'emirates',
        'office_address',
        'contact_number',
        'landline_number',
        'position',
        'linkedin_profile',
        'language_ids',
        'other_lang',
        'calendly_link',
        'moj_reg_no',
        'arbitration_area_id',
        'summary',
        'education',
        'honors_and_awards',
        'assosiation_and_membership',
        'disclaimer',
        'last_active_at',
        'is_verified',
        'email_verified_at',
        'password',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function arbitration() {
        return $this->belongsTo(ArbitrationArea::class, 'arbitration_area_id');
    }    

    public function getLawyerFee($id) {
        $lawService = LawyerService::whereServiceId($id)->first();
        return $lawService ? $lawService->lawyer_fee : null;
    }

    public function getPlatformFee($id) {
        $lawService = LawyerService::whereServiceId($id)->first();
        return $lawService ? $lawService->platform_fee : null;
    }

    public function isReadyWithSlot($userId) {
        $slotFee = SlotFees::whereLawyerId($userId)->first();
        if($slotFee && $slotFee->fifteen > 0 && $slotFee->thirty > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function lowestAmountOfferingForThisCategory($userId, $arbitrationAreaId) {
        $lowestAmount = Services::join('lawyer_services', 'services.id', '=', 'lawyer_services.service_id')
        ->where('services.arbitration_area_id', $arbitrationAreaId)
        ->where('services.added_by', $userId)
        ->selectRaw('MIN(lawyer_services.lawyer_fee + lawyer_services.platform_fee) as min_amount')
        ->pluck('min_amount')
        ->first();

        return $lowestAmount;
    }

    public function getLanguages($lawyerId) {
        $languageIds = Lawyer::whereId($lawyerId)->first();
        $languages = $this->getLanguageNames($languageIds->language_ids);
        $otherLang = explode(',', $languageIds->other_lang);
        $allLang = array_merge($otherLang, $languages);
        return implode(', ', $allLang);
    }

    public function getLanguageNames($languageIds) {
        $explodedLanguageIds = explode(',', $languageIds);
        $languages = Language::whereIn('id', $explodedLanguageIds)->get();
        $langs = [];
        foreach($languages as $k => $lang) {
            $langs[] = $lang->language;
        }
        return $langs;
    }
}
