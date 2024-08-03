<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Collection;
use App\Models\TableState;
use App\Observers\BaseCompanyObserver;
use Illuminate\Support\ServiceProvider;

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
        Cart::observe(BaseCompanyObserver::class);
        TableState::observe(BaseCompanyObserver::class);
        Collection::observe(BaseCompanyObserver::class);
    }
}
