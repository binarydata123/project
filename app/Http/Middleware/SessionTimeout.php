<?php

namespace App\Http\Middleware;

use App\Events\LawyerLoginLogout;
use App\Models\SessionUser;
use Closure;

class SessionTimeOut
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        foreach($request as $k => $v) {
            if($k === "cookies") {
                foreach($v as $j => $n) {
                    if($j === "laravel_session") {
                        if(auth()->id()) {
                            $isCreated = SessionUser::whereUserId(auth()->id())->first();
                            if(!$isCreated) {
                                SessionUser::create([
                                    'session_id' => $n,
                                    'user_id'    => auth()->id()
                                ]);
                            }
                        }
                    }
                }
            }
        }
        // print_r($request->session()->id);exit;
        // session()->forget('lastActivityTime'); 
        
        if (! session()->has('lastActivityTime')) {
            session(['lastActivityTime' => now()]);
            if(auth()->id())
                session(['user' => auth()->id()]);
        }
    
        // dd(
        //     session('lastActivityTime')->format('Y-M-jS h:i:s A'),
        //     now()->diffInMinutes(session('lastActivityTime')),
        //     now()->diffInMinutes(session('lastActivityTime')) >= config('session.lifetime')
        // );

        if (now()->diffInMinutes(session('lastActivityTime')) >= (config('session.lifetime') - 1) ) {
            if (auth()->check() && auth()->id() > 1) {
                event(new LawyerLoginLogout(auth()->user()->id, 'lawyerLoginLogout'));
               $user = auth()->user();
               auth()->logout();


               session()->forget('lastActivityTime');

               return redirect(route('home'));
           }

       }
       session(['lastActivityTime' => now()]);

       return $next($request);
    }
}
