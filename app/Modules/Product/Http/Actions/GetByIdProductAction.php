<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Actions;

use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class GetByIdProductAction
{
    public function __construct(protected ProductInterface $repository) {}

    public function execute(int|string $id): ?Product
    {
        return $this->repository->find($id);
    }
}
