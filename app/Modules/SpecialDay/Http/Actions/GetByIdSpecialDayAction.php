<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Actions;

use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;

class GetByIdSpecialDayAction
{
    public function __construct(protected SpecialDayInterface $repository) {}

    public function execute(int|string $id): \Illuminate\Database\Eloquent\Model
    {
        return $this->repository->findOrFail((int) $id);
    }
}
