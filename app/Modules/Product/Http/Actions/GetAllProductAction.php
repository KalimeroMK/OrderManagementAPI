<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Actions;

use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class GetAllProductAction
{
    public function __construct(protected ProductInterface $repository) {}

    /**
     * @return iterable<Product>
     */
    public function execute(): iterable
    {
        return $this->repository->all();
    }
}
