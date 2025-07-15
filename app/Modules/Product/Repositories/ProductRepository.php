<?php

declare(strict_types=1);

namespace App\Modules\Product\Repositories;

use App\Modules\Core\Repositories\EloquentRepository;
use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Models\Product;

class ProductRepository extends EloquentRepository implements ProductInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
