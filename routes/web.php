<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');

Route::get('/parties', [PartyController::class, 'index'])->name('parties');
Route::get('/parties/{slug}', [PartyController::class, 'show'])->name('party');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news-post');
Route::get('/profile', ProfileController::class)->name('profile');
Route::get('/privacy', fn () => view('privacy'))->name('privacy');


Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleCallback'])->name('auth.callback');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
