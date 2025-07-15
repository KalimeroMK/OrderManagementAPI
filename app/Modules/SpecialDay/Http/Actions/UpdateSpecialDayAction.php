<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Actions;

use App\Modules\SpecialDay\Http\DTOs\SpecialDayDTO;
use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Models\SpecialDay;
use Log;

class UpdateSpecialDayAction
{
    public function __construct(protected SpecialDayInterface $repository) {}

    public function execute(SpecialDayDTO $dto, SpecialDay $model): ?SpecialDay
    {
        if (empty($model->id)) {
            Log::error('SpecialDay update: model id is null', ['model' => $model, 'dto' => $dto]);

            return null;
        }

        return $this->repository->update($model->id, $dto->toArray());
    }
}
