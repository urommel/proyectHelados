<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonalsController;

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

Route::redirect('/', 'login');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function () {
        return view('pages/utility/404');
    });

    //route grup for personals
    // Route::get('/personals', [PersonalsController::class, 'index'])->name('personals');
    // Route::get('/personals/create', [PersonalsController::class, 'create'])->name('personals.create');
    // Route::post('/personals', [PersonalsController::class, 'store']);
    // Route::get('/personals/{id}/edit', [PersonalsController::class, 'edit']);
    // Route::put('/personals/{id}', [PersonalsController::class, 'update']);
    // Route::delete('/personals/{id}', [PersonalsController::class, 'destroy']);


});


// Route de personals resources
