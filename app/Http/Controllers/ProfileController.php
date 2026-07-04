<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $user->load(['registrations']);

        return view('profile', [
            'user' => $user,
            'stats' => [
                ['label' => 'Сыграно партий', 'value' => $user->completeParties()->count()],
                ['label' => 'Часов сыграно', 'value' => $user->completeParties()->sum('duration')],
            ],
        ]);
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, UserService $userService): RedirectResponse
    {
        $request->validate(['name' => 'required', 'avatar' => 'image']);

        $userService->updateProfile($request->user(), $request->string('name'), $request->file('avatar'));

        return redirect()->back();
    }
}
