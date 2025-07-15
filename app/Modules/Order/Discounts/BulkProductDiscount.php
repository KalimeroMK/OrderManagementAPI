<?php

declare(strict_types=1);

namespace App\Modules\Order\Discounts;

class BulkProductDiscount implements DiscountRuleInterface
{
    public function apply(float $subtotal, array $context): ?array
    {
        if (! empty($context['has_bulk_product'])) {
            return [
                'name' => 'Bulk Product',
                'amount' => 5.00,
            ];
        }

        return null;
    }
}
