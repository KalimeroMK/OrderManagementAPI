<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Actions;

use App\Modules\SpecialDay\Http\DTOs\SpecialDayDTO;
use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Models\SpecialDay;

class CreateSpecialDayAction
{
    public function __construct(protected SpecialDayInterface $repository) {}

    public function execute(SpecialDayDTO $dto): ?SpecialDay
    {
        return $this->repository->create($dto->toArray());
    }
}
