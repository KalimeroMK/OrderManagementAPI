<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Actions;

use App\Modules\Product\Http\DTOs\ProductDTO;
use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class CreateProductAction
{
    public function __construct(protected ProductInterface $repository) {}

    public function execute(ProductDTO $dto): ?Product
    {
        return $this->repository->create($dto->toArray());
    }
}
