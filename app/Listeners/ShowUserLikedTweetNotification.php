<?php

namespace App\Listeners;

use App\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShowUserLikedTweetNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::create([
            'type' => 'like',
            'from_user_id' => auth()->id(),
            'to_user_id' => $event->tweet->user->id,
            'tweet_id' => $event->tweet->id,
        ]);
    }
}
