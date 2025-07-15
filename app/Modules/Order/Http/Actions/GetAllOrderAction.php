<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Actions;

use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Models\Order;

class GetAllOrderAction
{
    public function __construct(protected OrderInterface $repository) {}

    /**
     * @return iterable<Order>
     */
    public function execute(): iterable
    {
        return $this->repository->all();
    }
}
