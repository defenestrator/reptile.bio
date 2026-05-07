<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Twitch\TwitchExtendSocialite;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Event::listen(SocialiteWasCalled::class, TwitchExtendSocialite::class);

        View::composer('*', function ($view) {
            $user = auth()->user();
            $view->with('isAdmin', $user?->isAdmin() ?? false);
            $view->with('isModerator', $user?->isModerator() ?? false);
        });
    }
}
