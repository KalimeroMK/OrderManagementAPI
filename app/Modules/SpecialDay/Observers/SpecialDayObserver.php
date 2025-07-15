<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Observers;

use App\Modules\SpecialDay\Models\SpecialDay;

class SpecialDayObserver
{
    public function creating(SpecialDay $model)
    {
        // ...
    }

    public function created(SpecialDay $model)
    {
        // ...
    }

    public function updating(SpecialDay $model)
    {
        // ...
    }

    public function updated(SpecialDay $model)
    {
        // ...
    }

    public function saving(SpecialDay $model)
    {
        // ...
    }

    public function saved(SpecialDay $model)
    {
        // ...
    }

    public function deleting(SpecialDay $model)
    {
        // ...
    }

    public function deleted(SpecialDay $model)
    {
        // ...
    }

    public function restoring(SpecialDay $model)
    {
        // ...
    }

    public function restored(SpecialDay $model)
    {
        // ...
    }
}
