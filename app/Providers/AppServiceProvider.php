<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Sleep;

class AppServiceProvider extends ServiceProvider {
    public function register(): void {
        //
    }

    public function boot(): void {
        Inertia::share([
            'appName' => config('app.name'),
        ]);

        if ($this->app->runningUnitTests()) {
            Sleep::fake();
        }

        Model::preventLazyLoading(!app()->isProduction());
        Model::shouldBeStrict();
        Vite::useAggressivePrefetching();
        Vite::useCacheBusting();
    }
}
