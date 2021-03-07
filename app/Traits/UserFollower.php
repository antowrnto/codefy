<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Events\Followed;
use App\Events\Unfollowed;

/**
 * Class UserFollower.
 *
 * @property int $following_id;
 * @property int $follower_id;
 */
class UserFollower extends Pivot
{
    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'created' => Followed::class,
        'deleted' => Unfollowed::class,
    ];
    
}
