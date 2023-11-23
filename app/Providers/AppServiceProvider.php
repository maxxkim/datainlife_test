<?php

namespace App\Providers;

use App\Models\GroupUser;
use App\Observers\GroupUserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        GroupUser::observe(GroupUserObserver::class);
    }
}
