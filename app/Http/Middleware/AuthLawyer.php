<?php

namespace App\Http\Middleware;

use App\Events\LawyerLoginLogout;
use App\Models\Lawyer;
use App\Models\SessionUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthLawyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $sessionId = null;
        foreach($request as $k => $v) {
            if($k === "cookies") {
                foreach($v as $j => $n) {
                    if($j === "laravel_session") {
                        $sessionId = $n;
                    }
                }
            }
        }
        

        if (!Auth::check()) {
            if($sessionId) {
                $getUserId = SessionUser::where([
                    ['session_id', $sessionId],
                    ['user_id', '!=', null]
                ])->first();
                if($getUserId) {
                    event(new LawyerLoginLogout($getUserId->user_id, 'lawyerLoginLogout'));
                    Cache::forget('user-is-online-' . $getUserId->user_id);
                    $deleteSessions = SessionUser::whereSessionId($sessionId)->get();
                    foreach($deleteSessions as $sk => $sv) {
                        $sv->delete();
                    }
                }
            }
            return redirect()->route('unauthenticated');
        }
        if(auth()->user()->user_type == 2) {
            $isVerified = Lawyer::whereUserId(auth()->user()->id)->first();
            if($isVerified->is_verified) {
                return $next($request);
            }else {
                return redirect()->route('unauthenticated');
            }
        }
        return redirect()->route('unauthenticated');
        // abort(403);
    }
}
