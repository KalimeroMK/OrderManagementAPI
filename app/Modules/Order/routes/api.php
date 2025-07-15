<?php

declare(strict_types=1);

use App\Modules\Order\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::apiResource('orders', OrderController::class);
    Route::get('orders/{order}/details', [OrderController::class, 'details']);
});
