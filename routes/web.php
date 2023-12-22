<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'cv/{cv}'], function(){
    Route::post('/work-experience/update', [WorkExperienceController::class, 'update']);
    Route::post('/personal-detail/update', [PersonalDetailController::class, 'update']);
    Route::post('/update', [CVController::class, 'update']);
    Route::get('/show', [CVController::class, 'show']);
    Route::post('/education/update', [EducationController::class, 'update']);
});

Route::delete('/work-experience/{workExperience}/delete', [WorkExperienceController::class, 'delete']);
Route::delete('/education/{education}/delete', [EducationController::class, 'delete']);

Route::controller(CVController::class)->group(function () {
    Route::get('/cv/create', 'create');
    Route::get('/cv/edit/{cv}', 'edit');
});
