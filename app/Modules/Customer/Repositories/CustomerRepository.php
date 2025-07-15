<?php

declare(strict_types=1);

namespace App\Modules\Customer\Repositories;

use App\Modules\Core\Repositories\EloquentRepository;
use App\Modules\Customer\Interfaces\CustomerInterface;
use App\Modules\Customer\Models\Customer;

class CustomerRepository extends EloquentRepository implements CustomerInterface
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
