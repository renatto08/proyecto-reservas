<?php

namespace App\Providers;

use App\Mail\EmailVerification;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https://');
        }
        
        Schema::defaultStringLength(191);

        VerifyEmail::toMailUsing(function ($notificable){
           $verifyUrl = URL::temporarySignedRoute(
               'verification.verify',
               Carbon::now()->addMinutes(Config::get('auth.verification.expire',60)),
               ['id' => $notificable->getKey(),'hash'=>sha1($notificable->email)]
           );
           return new EmailVerification($verifyUrl,$notificable);
        });
    }
}
