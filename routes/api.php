<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TiposEvaluacionApiController;

Route::apiResource('tipos_evaluacion', TiposEvaluacionApiController::class);

