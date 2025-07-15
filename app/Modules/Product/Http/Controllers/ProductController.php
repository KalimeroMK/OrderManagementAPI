<?php

declare(strict_types=1);

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Http\Actions\CreateProductAction;
use App\Modules\Product\Http\Actions\DeleteProductAction;
use App\Modules\Product\Http\Actions\GetAllProductAction;
use App\Modules\Product\Http\Actions\GetByIdProductAction;
use App\Modules\Product\Http\Actions\UpdateProductAction;
use App\Modules\Product\Http\DTOs\ProductDTO;
use App\Modules\Product\Http\Requests\CreateProductRequest;
use App\Modules\Product\Http\Requests\UpdateProductRequest;
use App\Modules\Product\Http\Resources\ProductResource;
use App\Modules\Product\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(GetAllProductAction $action): ResourceCollection
    {
        return ProductResource::collection($action->execute());
    }

    public function show(Product $product, GetByIdProductAction $action): JsonResponse
    {
        return response()->json(new ProductResource($action->execute($product->id)));
    }

    public function store(CreateProductRequest $request, CreateProductAction $action): JsonResponse
    {
        $dto = ProductDTO::fromRequest($request);
        $model = $action->execute($dto);

        return response()->json(new ProductResource($model), 201);
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $action): JsonResponse
    {
        $dto = ProductDTO::fromRequest($request);
        $model = $action->execute($dto, $product);

        return response()->json(new ProductResource($model));
    }

    public function destroy(Product $product, DeleteProductAction $action)
    {
        $action->execute($product);

        return response()->noContent();
    }
}
