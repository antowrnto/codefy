<?php

namespace App\Listeners;

use App\Events\Unfollowed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UnfollowedListener
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
     * @param  Unfollowed  $event
     * @return void
     */
    public function handle(Unfollowed $event)
    {
        $whoUser = User::findOrFail($event->followerId)->name;
        $toUser = User::findOrFail($event->followingId);
        Notification::send($toUser, new FollowableSendNotifications($whoUser, 'unfollowed'));
    }
}
