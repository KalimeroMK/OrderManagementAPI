<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Actions;

use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Models\Order;

class DeleteOrderAction
{
    public function __construct(protected OrderInterface $repository) {}

    public function execute(Order $model): bool
    {
        return $this->repository->delete($model->id);
    }
}
