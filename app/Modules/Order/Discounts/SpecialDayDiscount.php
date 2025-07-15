<?php

declare(strict_types=1);

namespace App\Modules\Order\Discounts;

class SpecialDayDiscount implements DiscountRuleInterface
{
    public function apply(float $subtotal, array $context): ?array
    {
        if (! empty($context['is_special_day'])) {
            $amount = round($subtotal * 0.20, 2);

            return [
                'name' => 'Special Day',
                'amount' => $amount,
            ];
        }

        return null;
    }
}
