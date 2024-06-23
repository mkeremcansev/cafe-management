<?php

namespace App\Providers;

use App\Services\MoneyService;
use Brick\Money\Money;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Collection::macro('moneySum', function (?string $moneyField = null, ?string $currency = null): Money {
            return $this
                ->when($moneyField !== null, fn (Collection $collection) => $collection->pluck($moneyField))
                ->reduce(
                    fn (Money $sum, int|Money $amount) => $sum->plus($amount instanceof Money ? $amount : MoneyService::ofMinor($amount)),
                    $currency === null ? MoneyService::zero() : Money::zero($currency)
                );
        });
    }
}
