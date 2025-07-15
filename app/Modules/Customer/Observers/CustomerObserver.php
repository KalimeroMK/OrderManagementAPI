<?php

declare(strict_types=1);

namespace App\Modules\Customer\Observers;

use App\Modules\Customer\Models\Customer;

class CustomerObserver
{
    public function creating(Customer $model)
    {
        // ...
    }

    public function created(Customer $model)
    {
        // ...
    }

    public function updating(Customer $model)
    {
        // ...
    }

    public function updated(Customer $model)
    {
        // ...
    }

    public function saving(Customer $model)
    {
        // ...
    }

    public function saved(Customer $model)
    {
        // ...
    }

    public function deleting(Customer $model)
    {
        // ...
    }

    public function deleted(Customer $model)
    {
        // ...
    }

    public function restoring(Customer $model)
    {
        // ...
    }

    public function restored(Customer $model)
    {
        // ...
    }
}
