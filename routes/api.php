<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('seasons', \App\Http\Controllers\Api\SeasonController::class);
Route::apiResource('competitions', \App\Http\Controllers\Api\CompetitionController::class);
Route::apiResource('teams', \App\Http\Controllers\Api\TeamController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
