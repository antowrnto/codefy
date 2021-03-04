<?php

namespace App\OAuth\Microsoft;

use SocialiteProviders\Manager\SocialiteWasCalled;

class LiveExtendSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('live', Provider::class);
    }
}