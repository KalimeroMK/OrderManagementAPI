<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Actions;

use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Models\SpecialDay;

class GetAllSpecialDayAction
{
    public function __construct(protected SpecialDayInterface $repository) {}

    /**
     * @return iterable<SpecialDay>
     */
    public function execute(): iterable
    {
        return $this->repository->all();
    }
}
