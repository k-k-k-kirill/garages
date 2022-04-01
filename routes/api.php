<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Garage as GarageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(GarageController::class)->group(function () {
    Route::get('/garages/all', 'all');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
