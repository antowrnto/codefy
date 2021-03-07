<?php

namespace App\Listeners;

use App\Events\Followed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\FollowableSendNotifications;

class FollowedListener
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
     * @param  Followed  $event
     * @return void
     */
    public function handle(Followed $event)
    {
        $whoUser = User::findOrFail($event->followerId)->name;
        $toUser = User::findOrFail($event->followingId);
        Notification::send($toUser, new FollowableSendNotifications($whoUser, 'followed'));
    }
}
