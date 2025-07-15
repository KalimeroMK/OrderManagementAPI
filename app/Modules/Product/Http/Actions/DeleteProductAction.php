<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Actions;

use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class DeleteProductAction
{
    public function __construct(protected ProductInterface $repository) {}

    public function execute(Product $model): bool
    {
        return $this->repository->delete($model->id);
    }
}
