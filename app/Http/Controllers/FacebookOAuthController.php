<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SocialAuthService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookOAuthController extends Controller
{
    private string $provider = 'facebook';

    public function redirect(SocialAuthService $socialAuthService)
    {
        return $socialAuthService->redirectToProvider($this->provider);
    }

    public function callback(SocialAuthService $socialAuthService)
    {
        try {

            $user = $socialAuthService->getUserInfoFromProvider($this->provider);

            if ($this->isAlreadyUser($user->id)) {
                return redirect()->route('home');
            } else {

                $retrievedUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => Hash::make('default_password'),
                    'email_verified_at' => now(),

                ]);

                $this->login($retrievedUser);
                return redirect()->route('home');
            }


        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

    }

    public function isAlreadyUser($userFbId): bool
    {
        $user = User::where('fb_id', $userFbId)->first();

        if ($user) {

            $this->login($user);
            return true;
        }

        return false;
    }

    public function login(User $user)
    {
        return Auth::login($user);
    }
}
