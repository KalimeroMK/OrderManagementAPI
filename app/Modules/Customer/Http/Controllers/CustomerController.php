<?php

declare(strict_types=1);

namespace App\Modules\Customer\Http\Controllers;

use App\Modules\Customer\Http\Actions\CreateCustomerAction;
use App\Modules\Customer\Http\Actions\DeleteCustomerAction;
use App\Modules\Customer\Http\Actions\GetAllCustomerAction;
use App\Modules\Customer\Http\Actions\GetByIdCustomerAction;
use App\Modules\Customer\Http\Actions\UpdateCustomerAction;
use App\Modules\Customer\Http\DTOs\CustomerDTO;
use App\Modules\Customer\Http\Requests\CreateCustomerRequest;
use App\Modules\Customer\Http\Requests\UpdateCustomerRequest;
use App\Modules\Customer\Http\Resources\CustomerResource;
use App\Modules\Customer\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    public function index(GetAllCustomerAction $action): ResourceCollection
    {
        return CustomerResource::collection($action->execute());
    }

    public function show(Customer $customer, GetByIdCustomerAction $action): JsonResponse
    {
        return response()->json(new CustomerResource($action->execute($customer->id)));
    }

    public function store(CreateCustomerRequest $request, CreateCustomerAction $action): JsonResponse
    {
        $dto = CustomerDTO::fromRequest($request);
        $model = $action->execute($dto);

        return response()->json(new CustomerResource($model), 201);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer, UpdateCustomerAction $action): JsonResponse
    {
        $dto = CustomerDTO::fromRequest($request);
        $model = $action->execute($dto, $customer);

        return response()->json(new CustomerResource($model));
    }

    public function destroy(Customer $customer, DeleteCustomerAction $action)
    {
        $action->execute($customer);

        return response()->noContent();
    }
}
