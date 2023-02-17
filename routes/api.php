<?php

use App\Http\Controllers\Api\DocFromSpecController;
use App\Http\Controllers\Api\DocProfileController;
use App\Http\Controllers\Api\SaveMessageController;
use App\Http\Controllers\Api\SaveReviewController;
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

Route::get('/doc/{slug}', [DocProfileController::class, 'show']);

Route::get('/doc/spec/{id}', [DocFromSpecController::class, 'show']);

Route::get('/spec', [SpecsController::class, 'index']);

Route::post('/savemessage/{id}', [SaveMessageController::class, 'store']);

Route::post('/savereview/{id}', [SaveReviewController::class, 'store']);
