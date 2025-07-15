<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Actions;

use App\Modules\Product\Http\DTOs\ProductDTO;
use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class UpdateProductAction
{
    public function __construct(protected ProductInterface $repository) {}

    public function execute(ProductDTO $dto, Product $model): ?Product
    {
        return $this->repository->update($model->id, $dto->toArray());
    }
}
