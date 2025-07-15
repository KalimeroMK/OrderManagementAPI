<?php

declare(strict_types=1);

namespace App\Modules\Order\Discounts;

interface DiscountRuleInterface
{
    /**
     * @return array [ 'name' => string, 'amount' => float ]|null
     */
    public function apply(float $subtotal, array $context): ?array;
}
