<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class UserService
{
    public function createOrUpdateFromSocialite(SocialiteUser $socialiteUser, string $provider)
    {
        $user = User::where('socialite_provider', $provider)
            ->where('socialite_provider_id', $socialiteUser->getId())
            ->first();

        if ($user) {
            $user->update([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
            ]);

            return $user;
        }

        return User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'socialite_provider' => $provider,
            'socialite_provider_id' => $socialiteUser->getId(),
            'password' => Str::password(),
        ]);
    }
}
