<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Policies;

use App\Models\User;
use App\Modules\SpecialDay\Models\SpecialDay;

class SpecialDayPolicy
{
    public function viewAny(User $user): bool
    {
        // ...
        return true;
    }

    public function view(User $user, SpecialDay $model): bool
    {
        // ...
        return true;
    }

    public function create(User $user): bool
    {
        // ...
        return true;
    }

    public function update(User $user, SpecialDay $model): bool
    {
        // ...
        return true;
    }

    public function delete(User $user, SpecialDay $model): bool
    {
        // ...
        return true;
    }

    public function restore(User $user, SpecialDay $model): bool
    {
        // ...
        return true;
    }

    public function forceDelete(User $user, SpecialDay $model): bool
    {
        // ...
        return true;
    }
}
