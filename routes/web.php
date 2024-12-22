<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DataAnggotaController;


Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/data-anggota', [DataAnggotaController::class, 'index']);


