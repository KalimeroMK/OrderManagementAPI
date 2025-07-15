<?php

declare(strict_types=1);

namespace App\Modules\Order\Discounts;

class OrderOver100Discount implements DiscountRuleInterface
{
    public function apply(float $subtotal, array $context): ?array
    {
        if ($subtotal > 100) {
            $amount = round($subtotal * 0.10, 2);

            return [
                'name' => 'Order > 100€',
                'amount' => $amount,
            ];
        }

        return null;
    }
}
