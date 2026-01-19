<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebsiteController;


Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('home');
    Route::get('/patient-list', [WebsiteController::class, 'patientList'])->name('patient-list');
    Route::post('/patient-register', [WebsiteController::class, 'patientRegister'])->name('patient-register');
    Route::get('/patient-list-date', [WebsiteController::class, 'patientListData'])->name('patient-list-date');

});
