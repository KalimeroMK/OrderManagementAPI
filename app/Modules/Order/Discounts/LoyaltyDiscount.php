<?php

declare(strict_types=1);

namespace App\Modules\Order\Discounts;

class LoyaltyDiscount implements DiscountRuleInterface
{
    public function apply(float $subtotal, array $context): ?array
    {
        if (($context['customer_order_count'] ?? 0) > 5) {
            $amount = round($subtotal * 0.05, 2);

            return [
                'name' => 'Loyalty',
                'amount' => $amount,
            ];
        }

        return null;
    }
}
