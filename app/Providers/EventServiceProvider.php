<?php

namespace App\Providers;

use App\Events\UserLogin;
use App\Events\UserLogout;
use App\Listeners\EmailAdminUserLogin;
use App\Listeners\TraceUserLogout;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserLogin::class => [
            EmailAdminUserLogin::class
        ],

        UserLogout::class => [
            TraceUserLogout::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
