<?php

declare(strict_types=1);

namespace App\Modules\Order\Repositories;

use App\Modules\Core\Repositories\EloquentRepository;
use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Models\Order;

class OrderRepository extends EloquentRepository implements OrderInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}
