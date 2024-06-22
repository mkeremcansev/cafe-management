<?php

namespace App\Services;

use App\Enums\CurrencyCode;
use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;
use Brick\Money\Context;
use Brick\Money\Context\CustomContext;
use Brick\Money\Money;

class MoneyService
{
    public function of(
        BigNumber|int|float|string $amount,
        ?Context $context = null,
        RoundingMode $roundingMode = RoundingMode::UNNECESSARY
    ): Money {
        return Money::of(
            amount: $amount,
            currency: CurrencyCode::TRY->value,
            context: $context ?? new CustomContext(2),
            roundingMode: $roundingMode
        );
    }

    public static function ofMinor(
        BigNumber|int|float|string $minorAmount,
        ?Context $context = null,
        RoundingMode $roundingMode = RoundingMode::UNNECESSARY
    ): Money {
        return Money::ofMinor(
            minorAmount: $minorAmount,
            currency: CurrencyCode::TRY->value,
            context: $context ?? new CustomContext(2),
            roundingMode: $roundingMode
        );
    }

    public function zero(?Context $context = null): Money
    {
        return Money::zero(
            currency: CurrencyCode::TRY->value,
            context: $context ?? new CustomContext(2),
        );
    }

    public function round(Money $amount, int $roundingValue): Money
    {
        $context = $amount->getContext();

        return $amount
            ->dividedBy($roundingValue, RoundingMode::HALF_EVEN)
            ->to(new CustomContext(0), RoundingMode::HALF_UP)
            ->multipliedBy($roundingValue, RoundingMode::HALF_EVEN)
            ->to($context, RoundingMode::HALF_EVEN);
    }
}
