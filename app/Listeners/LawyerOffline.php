<?php

namespace App\Listeners;

use App\Events\MakeLawyerOffline;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use JulioMotol\AuthTimeout\Events\AuthTimeoutEvent;

class LawyerOffline
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MakeLawyerOffline  $event
     * @return void
     */
    public function handle(AuthTimeoutEvent $event)
    {
        // $event->user;   // The user that timed out.
        // $event->guard;  // The authentication guard.
    }
}
