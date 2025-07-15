<?php

declare(strict_types=1);

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

namespace App\Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $casts = [

    ];

    protected $fillable = [
        'name', 'email',
    ];

    public static function newFactory(): \App\Modules\Customer\Database\Factories\CustomerFactory
    {
        return \App\Modules\Customer\Database\Factories\CustomerFactory::new();
    }

    // RELATIONSHIPS

    public function orders()
    {
        return $this->hasMany(\App\Modules\Order\Models\Order::class);
    }
}
