<?php

declare(strict_types=1);

namespace App\Modules\Order\Observers;

use App\Modules\Order\Models\Order;

class OrderObserver
{
    public function creating(Order $model)
    {
        // ...
    }

    public function created(Order $model)
    {
        // ...
    }

    public function updating(Order $model)
    {
        // ...
    }

    public function updated(Order $model)
    {
        // ...
    }

    public function saving(Order $model)
    {
        // ...
    }

    public function saved(Order $model)
    {
        // ...
    }

    public function deleting(Order $model)
    {
        // ...
    }

    public function deleted(Order $model)
    {
        // ...
    }

    public function restoring(Order $model)
    {
        // ...
    }

    public function restored(Order $model)
    {
        // ...
    }
}
