<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Actions;

use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Models\Order;

class GetByIdOrderAction
{
    public function __construct(protected OrderInterface $repository) {}

    public function execute(int|string $id): ?Order
    {
        return $this->repository->find($id);
    }
}
