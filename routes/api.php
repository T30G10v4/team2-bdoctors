<?php

use App\Http\Controllers\Api\DocFromSpecController;
use App\Http\Controllers\Api\DocProfileController;
use App\Http\Controllers\Api\SpecsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doc', [DocProfileController::class, 'index']);
// /doc/{id}
// /doc/spec/{spec}
Route::get('/doc/spec/{id}', [DocFromSpecController::class, 'show']);
Route::get('/spec', [SpecsController::class, 'index']);
