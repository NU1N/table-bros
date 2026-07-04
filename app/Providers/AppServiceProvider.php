<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\VKontakte\Provider as VKontakteProvider;
use SocialiteProviders\Yandex\Provider as YandexProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('vkontakte', VKontakteProvider::class);
        });

        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('yandex', YandexProvider::class);
        });
    }
}
