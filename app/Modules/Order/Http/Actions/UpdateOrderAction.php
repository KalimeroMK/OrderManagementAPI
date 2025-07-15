<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Actions;

use App\Modules\Order\Http\DTOs\OrderDTO;
use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Models\Order;

class UpdateOrderAction
{
    public function __construct(protected OrderInterface $repository) {}

    public function execute(OrderDTO $dto, Order $model): ?Order
    {
        return $this->repository->update($model->id, $dto->toArray());
    }
}
