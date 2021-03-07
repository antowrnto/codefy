<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use SocialiteProviders\Manager\SocialiteWasCalled;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\Followed;
use App\Listeners\FollowedListener;
use App\Events\Unfollowed;
use App\Listeners\UnfollowedListener;

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
        
        Followed::class => [
            FollowedListener::class,
        ],
        
        Unfollowed::class => [
            UnfollowedListener::class,
        ],
        
        SocialiteWasCalled::class => [
          'App\\OAuth\\Microsoft\\LiveExtendSocialite@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
