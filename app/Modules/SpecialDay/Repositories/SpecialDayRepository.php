<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Repositories;

use App\Modules\Core\Repositories\EloquentRepository;
use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Models\SpecialDay;

class SpecialDayRepository extends EloquentRepository implements SpecialDayInterface
{
    public function __construct(SpecialDay $model)
    {
        parent::__construct($model);
    }
}
