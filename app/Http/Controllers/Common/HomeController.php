<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        // return view('common.index');
        return view('common.home');
        return view('common.home2');
    }

    public function onlineOfflineLawyers($section) {
        $lawyers = Lawyer::whereIsVerified(1)->get();
        $onlineLawyers = 0;
        $offlineLawyers = 0;
        foreach($lawyers as $k => $v) {
            if($v->user->isOnline()) {
                ++$onlineLawyers;
            }else {
                ++$offlineLawyers;
            }
        }
        if($section === "nav") {
            $onlineOffline = (string) view('common.lawyer-online-offline', compact('lawyers', 'onlineLawyers', 'offlineLawyers'));
            $onlineOfflineCount = (string) view('common.lawyer-online-count', compact('onlineLawyers'));
    
            return ['onlineOffline' => $onlineOffline, 'onlineOfflineCount' => $onlineOfflineCount];            
        }else {
            return (string) view('common.lawyer-online-offline-page', compact('lawyers', 'onlineLawyers'));
        }
    }
}
