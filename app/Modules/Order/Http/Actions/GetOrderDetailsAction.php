<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Actions;

use App\Modules\Order\Discounts\BulkProductDiscount;
use App\Modules\Order\Discounts\LoyaltyDiscount;
use App\Modules\Order\Discounts\OrderOver100Discount;
use App\Modules\Order\Discounts\SpecialDayDiscount;
use App\Modules\Order\Models\Order;
use Illuminate\Support\Facades\DB;

class GetOrderDetailsAction
{
    /**
     * Returns order details, subtotal, applied discounts, and total.
     */
    public function execute(Order $order): array
    {
        $products = $order->products()->withPivot('quantity')->get();
        $subtotal = $products->sum(fn ($p) => $p->price * $p->pivot->quantity);

        // Context for discounts
        $customerOrderCount = $order->customer->orders()->count();
        $isSpecialDay = DB::table('special_days')->where('date', $order->order_date)->exists();
        $hasBulkProduct = $products->contains(fn ($p) => $p->pivot->quantity >= 3);

        $context = [
            'customer_order_count' => $customerOrderCount,
            'is_special_day' => $isSpecialDay,
            'has_bulk_product' => $hasBulkProduct,
        ];

        $discounts = [];
        $rules = [
            new OrderOver100Discount(),
            new LoyaltyDiscount(),
            new SpecialDayDiscount(),
            new BulkProductDiscount(),
        ];

        // Calculate all discounts based on the original subtotal
        foreach ($rules as $rule) {
            $discount = $rule->apply($subtotal, $context);
            if ($discount) {
                $discounts[] = $discount;
            }
        }

        // Calculate total by subtracting all discounts from the subtotal
        $totalDiscount = array_sum(array_column($discounts, 'amount'));
        $total = max($subtotal - $totalDiscount, 0);

        return [
            'order_id' => $order->id,
            'products' => $products->map(fn ($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'quantity' => $p->pivot->quantity,
                'price' => $p->price,
            ]),
            'subtotal' => $subtotal,
            'discounts' => $discounts,
            'total' => $total,
        ];
    }
}
