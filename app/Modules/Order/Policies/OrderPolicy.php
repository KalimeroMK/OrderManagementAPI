<?php

declare(strict_types=1);

namespace App\Modules\Order\Policies;

use App\Models\User;
use App\Modules\Order\Models\Order;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        // ...
        return true;
    }

    public function view(User $user, Order $model): bool
    {
        // ...
        return true;
    }

    public function create(User $user): bool
    {
        // ...
        return true;
    }

    public function update(User $user, Order $model): bool
    {
        // ...
        return true;
    }

    public function delete(User $user, Order $model): bool
    {
        // ...
        return true;
    }

    public function restore(User $user, Order $model): bool
    {
        // ...
        return true;
    }

    public function forceDelete(User $user, Order $model): bool
    {
        // ...
        return true;
    }
}
