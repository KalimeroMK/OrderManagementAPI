<?php

declare(strict_types=1);

namespace App\Modules\Order\Http\Controllers;

use App\Modules\Order\Http\Actions\CreateOrderAction;
use App\Modules\Order\Http\Actions\DeleteOrderAction;
use App\Modules\Order\Http\Actions\GetAllOrderAction;
use App\Modules\Order\Http\Actions\GetOrderDetailsAction;
use App\Modules\Order\Http\Actions\UpdateOrderAction;
use App\Modules\Order\Http\DTOs\OrderDTO;
use App\Modules\Order\Http\Requests\CreateOrderRequest;
use App\Modules\Order\Http\Requests\UpdateOrderRequest;
use App\Modules\Order\Http\Resources\OrderResource;
use App\Modules\Order\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index(GetAllOrderAction $action): ResourceCollection
    {
        return OrderResource::collection($action->execute());
    }

    public function show(Order $order): JsonResponse
    {
        $action = app(GetOrderDetailsAction::class);

        return response()->json($action->execute($order));
    }

    public function store(CreateOrderRequest $request, CreateOrderAction $action): JsonResponse
    {
        $dto = OrderDTO::fromRequest($request);
        $model = $action->execute($dto);

        return response()->json(new OrderResource($model), 201);
    }

    public function update(UpdateOrderRequest $request, Order $order, UpdateOrderAction $action): JsonResponse
    {
        $dto = OrderDTO::fromRequest($request);
        $model = $action->execute($dto, $order);

        return response()->json(new OrderResource($model));
    }

    public function destroy(Order $order, DeleteOrderAction $action)
    {
        $action->execute($order);

        return response()->noContent();
    }

    public function details(Order $order): JsonResponse
    {
        $action = app(GetOrderDetailsAction::class);

        return response()->json($action->execute($order));
    }
}
