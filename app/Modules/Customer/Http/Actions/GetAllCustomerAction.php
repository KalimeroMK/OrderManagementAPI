<?php

declare(strict_types=1);

namespace App\Modules\Customer\Http\Actions;

use App\Modules\Customer\Interfaces\CustomerInterface;
use App\Modules\Customer\Models\Customer;

class GetAllCustomerAction
{
    public function __construct(protected CustomerInterface $repository) {}

    /**
     * @return iterable<Customer>
     */
    public function execute(): iterable
    {
        return $this->repository->all();
    }
}
