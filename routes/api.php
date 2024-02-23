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

Route::apiResources([
    'seasons' => \App\Http\Controllers\Api\SeasonController::class,
    'competitions' => \App\Http\Controllers\Api\CompetitionController::class,
    'teams' => \App\Http\Controllers\Api\TeamController::class,
    'players' => \App\Http\Controllers\Api\PlayerController::class
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
