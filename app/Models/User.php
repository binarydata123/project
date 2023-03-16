<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'prefix',
        'user_type',
        'messenger_color',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function getColor() {
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
        return $color;
    }

    public function getLawyerId($userId) {
        $lawyer = Lawyer::whereUserId($userId)->first();
        return $lawyer->id;
    }
    
    public function getProfilePic($userId) {
        $lawyer = Lawyer::whereUserId($userId)->first();
        return $lawyer->profile_pic;
    }

    public function getEmirates($userId) {
        $lawyer = Lawyer::whereUserId($userId)->first();
        return $lawyer->emirates;
    }

    public function getArea($userId) {
        $lawyer = Lawyer::whereUserId($userId)->first();
        return $lawyer->arbitration->area;
    }

    public function latestMsg($userId) {
        $latest = ChMessage::where('from_id', auth()->user()->id)
                ->where('to_id', $userId)
                ->orWhere('from_id', $userId)
                ->where('to_id', auth()->user()->id)
                ->latest()
                ->first();
        if($latest && strlen($latest->body) > 10) {
            return substr($latest->body, 0, 10).'...';
        }else {
            return $latest ? substr($latest->body, 0, 10) : '-';
        }
        return null;
    } 

    public function latestMsgCreatedAt($userId) {
        $latest = ChMessage::where('from_id', auth()->user()->id)
                ->where('to_id', $userId)
                ->orWhere('from_id', $userId)
                ->where('to_id', auth()->user()->id)
                ->latest()
                ->first();
        return $latest ? date('g:i A', strtotime($latest->created_at)) : '';
    } 
}
