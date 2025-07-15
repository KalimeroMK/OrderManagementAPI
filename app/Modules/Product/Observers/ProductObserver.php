<?php

declare(strict_types=1);

namespace App\Modules\Product\Observers;

use App\Modules\Product\Models\Product;

class ProductObserver
{
    public function creating(Product $model)
    {
        // ...
    }

    public function created(Product $model)
    {
        // ...
    }

    public function updating(Product $model)
    {
        // ...
    }

    public function updated(Product $model)
    {
        // ...
    }

    public function saving(Product $model)
    {
        // ...
    }

    public function saved(Product $model)
    {
        // ...
    }

    public function deleting(Product $model)
    {
        // ...
    }

    public function deleted(Product $model)
    {
        // ...
    }

    public function restoring(Product $model)
    {
        // ...
    }

    public function restored(Product $model)
    {
        // ...
    }
}
