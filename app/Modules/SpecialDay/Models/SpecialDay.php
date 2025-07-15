<?php

declare(strict_types=1);

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

namespace App\Modules\SpecialDay\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialDay extends Model
{
    use HasFactory;

    protected $table = 'special_days';

    protected $casts = [

    ];

    protected $fillable = [
        'date',
    ];

    public static function newFactory(): \App\Modules\SpecialDay\Database\Factories\SpecialDayFactory
    {
        return \App\Modules\SpecialDay\Database\Factories\SpecialDayFactory::new();
    }

    // RELATIONSHIPS

}
