<?php

declare(strict_types=1);

namespace App\Modules\Customer\Http\Actions;

use App\Modules\Customer\Http\DTOs\CustomerDTO;
use App\Modules\Customer\Interfaces\CustomerInterface;
use App\Modules\Customer\Models\Customer;

class CreateCustomerAction
{
    public function __construct(protected CustomerInterface $repository) {}

    public function execute(CustomerDTO $dto): ?Customer
    {
        return $this->repository->create($dto->toArray());
    }
}
