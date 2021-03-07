<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Traits\UserFollower;

class Followed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $followingId;

    public $followerId;

    protected $relation;

    public function __construct(UserFollower $relation)
    {
        $this->relation = $relation;
        $this->followerId = $relation->follower_id;
        $this->followingId = $relation->following_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
