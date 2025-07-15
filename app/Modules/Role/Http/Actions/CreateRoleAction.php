<?php

declare(strict_types=1);

namespace App\Modules\Role\Http\Actions;

use App\Modules\Role\Http\DTOs\RoleDTO;
use App\Modules\Role\Interfaces\RoleInterface;
use App\Modules\Role\Models\Role;

class CreateRoleAction
{
    public function __construct(protected RoleInterface $repository) {}

    public function execute(RoleDTO $dto): Role
    {
        /** @var Role $role */
        $role = $this->repository->create([
            'name' => $dto->name,
        ]);

        return $role;
    }
}
