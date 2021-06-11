<?php

namespace App\Providers;

use App\Events\UserFollowedMeEvent;
use App\Events\UserLikedMyTweetEvent;
use App\Listeners\ShowUserFollowedNotification;
use App\Listeners\ShowUserLikedTweetNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        UserFollowedMeEvent::class => [
            ShowUserFollowedNotification::class,
        ],
        UserLikedMyTweetEvent::class => [
            ShowUserLikedTweetNotification::class,
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
