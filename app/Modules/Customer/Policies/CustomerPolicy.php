<?php

declare(strict_types=1);

namespace App\Modules\Customer\Policies;

use App\Models\User;
use App\Modules\Customer\Models\Customer;

class CustomerPolicy
{
    public function viewAny(User $user): bool
    {
        // ...
        return true;
    }

    public function view(User $user, Customer $model): bool
    {
        // ...
        return true;
    }

    public function create(User $user): bool
    {
        // ...
        return true;
    }

    public function update(User $user, Customer $model): bool
    {
        // ...
        return true;
    }

    public function delete(User $user, Customer $model): bool
    {
        // ...
        return true;
    }

    public function restore(User $user, Customer $model): bool
    {
        // ...
        return true;
    }

    public function forceDelete(User $user, Customer $model): bool
    {
        // ...
        return true;
    }
}
