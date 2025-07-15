<?php

declare(strict_types=1);

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $casts = [
        'price' => 'float',
    ];

    protected $fillable = [
        'name', 'price',
    ];

    public static function newFactory(): \App\Modules\Product\Database\Factories\ProductFactory
    {
        return \App\Modules\Product\Database\Factories\ProductFactory::new();
    }

    // RELATIONSHIPS

}
