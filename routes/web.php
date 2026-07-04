<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartySignupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');

Route::group(['prefix' => 'parties'], function () {
    Route::get('', [PartyController::class, 'index'])->name('parties');
    Route::get('{slug}', [PartyController::class, 'show'])->name('party');
    Route::post('{party}/signup', PartySignupController::class)->name('party.signup');
});

Route::group(['prefix' => 'news'], function () {
    Route::get('', [NewsController::class, 'index'])->name('news');
    Route::get('{slug}', [NewsController::class, 'show'])->name('news-post');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile');
    Route::post('', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/privacy', fn () => view('privacy'))->name('privacy');

Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleCallback'])->name('auth.callback');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
