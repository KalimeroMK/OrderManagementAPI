<?php

declare(strict_types=1);

namespace App\Modules\Customer\Http\Actions;

use App\Modules\Customer\Interfaces\CustomerInterface;
use App\Modules\Customer\Models\Customer;

class DeleteCustomerAction
{
    public function __construct(protected CustomerInterface $repository) {}

    public function execute(Customer $model): bool
    {
        return $this->repository->delete($model->id);
    }
}
