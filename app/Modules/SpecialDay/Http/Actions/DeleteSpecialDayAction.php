<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Actions;

use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Models\SpecialDay;
use Illuminate\Support\Facades\Log;

class DeleteSpecialDayAction
{
    public function __construct(protected SpecialDayInterface $repository) {}

    public function execute(SpecialDay $model): bool
    {
        if (empty($model->id)) {
            Log::error('SpecialDay delete: model id is null', ['model' => $model]);

            return false;
        }

        return $this->repository->delete($model->id);
    }
}
