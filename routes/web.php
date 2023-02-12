<?php

use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('docProfile/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('docProfile.index');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('docProfile', [DocProfileController::class, 'show']);
    Route::resource('docProfile', DocProfileController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show']);
    Route::resource('reviews', ReviewController::class)->only(['index', 'show']);
    Route::get('my-stats', [ChartJSController::class, 'index'])->name('stats');
});



// Route::get('docProfile/create', [DocProfileController::class, 'create'])->middleware(['auth', 'verified'])->name('docProfile.create');



require __DIR__ . '/auth.php';
