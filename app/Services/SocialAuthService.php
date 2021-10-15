<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use App\Interfaces\OAuthInterface;
use Illuminate\Http\Request;

class SocialAuthService implements OAuthInterface
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function getUserInfoFromProvider($provider)
    {
        return Socialite::driver($provider)->user();
    }
}

