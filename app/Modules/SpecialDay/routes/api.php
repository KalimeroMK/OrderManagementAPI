<?php

declare(strict_types=1);

use App\Modules\SpecialDay\Http\Controllers\SpecialDayController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::apiResource('special_days', SpecialDayController::class);
});
