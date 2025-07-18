<?php

declare(strict_types=1);

namespace App\Modules\Product\Policies;

use App\Models\User;
use App\Modules\Product\Models\Product;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        // ...
        return true;
    }

    public function view(User $user, Product $model): bool
    {
        // ...
        return true;
    }

    public function create(User $user): bool
    {
        // ...
        return true;
    }

    public function update(User $user, Product $model): bool
    {
        // ...
        return true;
    }

    public function delete(User $user, Product $model): bool
    {
        // ...
        return true;
    }

    public function restore(User $user, Product $model): bool
    {
        // ...
        return true;
    }

    public function forceDelete(User $user, Product $model): bool
    {
        // ...
        return true;
    }
}
