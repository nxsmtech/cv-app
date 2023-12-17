<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::controller(CVController::class)->group(function () {
    Route::get('/cv/create', 'create')->name('cv.create');
    Route::post('/cv/store', 'store')->name('cv.store');
    Route::get('/cv/edit/{cv}', 'edit')->name('cv.edit');

    Route::put('/cv/{cv}/update', 'update')->name('cv.update');
    Route::post('/cv/{cv}/personal-detail/update', 'updatePersonalDetail')->name('cv.update.personal-details');
//    Route::put('/cv/personal-details/{personal-detail}', '')
});
