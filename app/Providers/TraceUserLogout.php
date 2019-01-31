<?php

namespace App\Providers;

use App\Providers\UserLogout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TraceUserLogout
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
     * @param  UserLogout  $event
     * @return void
     */
    public function handle(UserLogout $event)
    {
        //
    }
}
