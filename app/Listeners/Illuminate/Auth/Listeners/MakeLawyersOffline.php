<?php

namespace App\Listeners\Illuminate\Auth\Listeners;

use App\Events\JulioMotol\AuthTimeout\Events\AuthTimeoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLawyersOffline
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\JulioMotol\AuthTimeout\Events\AuthTimeoutEvent  $event
     * @return void
     */
    public function handle(AuthTimeoutEvent $event)
    {
        //
    }
}
