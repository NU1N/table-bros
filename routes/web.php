<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/parties', function () {
    return view('parties');
})->name('parties');;

Route::get('/parties/slug', function () {
    return view('party');
});

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/news/slug', function () {
    return view('news-post');
});


Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');;


Route::get('/profile', function () {
    return view('profile');
});
