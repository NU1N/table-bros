<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserService
{
    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function updateProfile(User $user, string $name, ?UploadedFile $avatar): void
    {
        if ($avatar) {
            $user->addMedia($avatar)->toMediaCollection('avatar');
        }

        $user->name = $name;
        $user->save();
    }

    public function createOrUpdateFromSocialite(SocialiteUser $socialiteUser, string $provider)
    {
        $user = User::where('socialite_provider', $provider)
            ->where('socialite_provider_id', $socialiteUser->getId())
            ->first();

        if ($user) {
            $user->update([
                'email' => $socialiteUser->getEmail(),
            ]);

            return $user;
        }

        $user = User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'socialite_provider' => $provider,
            'socialite_provider_id' => $socialiteUser->getId(),
            'password' => Str::password(),
        ]);
        $user->addMediaFromUrl($socialiteUser->getAvatar())->toMediaCollection('avatar');

        return $user;
    }
}
