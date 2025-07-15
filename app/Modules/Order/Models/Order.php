<?php

declare(strict_types=1);

/**
 * @property int $id
 * @property mixed $customer_id
 * @property \Illuminate\Support\Carbon $order_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

namespace App\Modules\Order\Models;

use App\Modules\Customer\Models\Customer;
use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $casts = [

    ];

    protected $fillable = [
        'customer_id', 'order_date', 'status',
    ];

    public static function newFactory(): \App\Modules\Order\Database\Factories\OrderFactory
    {
        return \App\Modules\Order\Database\Factories\OrderFactory::new();
    }

    // RELATIONSHIPS
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
