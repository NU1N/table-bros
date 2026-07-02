<?php

namespace App\Http\Controllers;

use App\Enums\SocialiteProvider;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {}

    /**
     * Redirect the user to the social provider authentication page.
     */
    public function redirectToProvider(string $provider): RedirectResponse
    {
        $driver = SocialiteProvider::tryFrom($provider);

        if (is_null($driver)) {
            abort(404);
        }

        return Socialite::driver($driver->value)->redirect();
    }

    /**
     * Obtain the user information from the social provider.
     */
    public function handleCallback(string $provider): RedirectResponse
    {
        $driver = SocialiteProvider::tryFrom($provider);

        if (is_null($driver)) {
            abort(404);
        }

        return $this->socialiteLogin($driver->value);
    }

    /**
     * Handle the socialite callback and log the user in.
     */
    protected function socialiteLogin(string $driver): RedirectResponse
    {
        $socialiteUser = Socialite::driver($driver)->user();
        $user = $this->userService->createOrUpdateFromSocialite($socialiteUser, $driver);

        Auth::login($user);

        return redirect()->intended(route('profile', absolute: false));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('landing');
    }
}
