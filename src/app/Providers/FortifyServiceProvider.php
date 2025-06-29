<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Cache\RateLimiting\Limit; 
use Illuminate\Support\Facades\RateLimiter;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register-step1');
        });

        RateLimiter::for('login', function () {
            return Limit::none(); // ← 制限を無効化！
        });

       
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
                return redirect('/register/step2');
            }
        });
    }
}