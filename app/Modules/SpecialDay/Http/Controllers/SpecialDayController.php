<?php

declare(strict_types=1);

namespace App\Modules\SpecialDay\Http\Controllers;

use App\Modules\SpecialDay\Http\Actions\CreateSpecialDayAction;
use App\Modules\SpecialDay\Http\Actions\DeleteSpecialDayAction;
use App\Modules\SpecialDay\Http\Actions\GetAllSpecialDayAction;
use App\Modules\SpecialDay\Http\Actions\GetByIdSpecialDayAction;
use App\Modules\SpecialDay\Http\Actions\UpdateSpecialDayAction;
use App\Modules\SpecialDay\Http\DTOs\SpecialDayDTO;
use App\Modules\SpecialDay\Http\Requests\CreateSpecialDayRequest;
use App\Modules\SpecialDay\Http\Requests\UpdateSpecialDayRequest;
use App\Modules\SpecialDay\Http\Resources\SpecialDayResource;
use App\Modules\SpecialDay\Models\SpecialDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;

class SpecialDayController extends Controller
{
    public function index(GetAllSpecialDayAction $action): ResourceCollection
    {
        return SpecialDayResource::collection($action->execute());
    }

    public function show(SpecialDay $special_day, GetByIdSpecialDayAction $action): JsonResponse
    {
        return response()->json(new SpecialDayResource($action->execute($special_day->id)));
    }

    public function store(CreateSpecialDayRequest $request, CreateSpecialDayAction $action): JsonResponse
    {
        $dto = SpecialDayDTO::fromRequest($request);
        $model = $action->execute($dto);

        return response()->json(new SpecialDayResource($model), 201);
    }

    public function update(UpdateSpecialDayRequest $request, SpecialDay $special_day, UpdateSpecialDayAction $action): JsonResponse
    {
        $dto = SpecialDayDTO::fromRequest($request);
        $model = $action->execute($dto, $special_day);

        return response()->json(new SpecialDayResource($model));
    }

    public function destroy(SpecialDay $special_day, DeleteSpecialDayAction $action)
    {
        $action->execute($special_day);

        return response()->noContent();
    }
}
