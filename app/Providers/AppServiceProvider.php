<?php

namespace App\Providers;

use App\Models\Job;
use Inertia\Inertia;
use App\Observers\JobObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('errors', function () {
            return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object) [];
        });

        Inertia::share('successMessage', function () {
            return session()->get('successMessage') ? session()->get('successMessage') : null;
        });

        // Inertia::share('authuser', function () {
        //     return   Auth::user() ? Auth::user() : null;
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Job::observe(JobObserver::class);
    }
}
