<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterStep1Controller;
use App\Http\Controllers\Auth\RegisterStep2Controller;

use App\Http\Controllers\WeightController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/register/step1', [RegisterStep1Controller::class, 'show'])->name('register.step1');
Route::post('/register/step1', [RegisterStep1Controller::class, 'store'])->name('register.step1.store');

Route::middleware('auth')->group(function () {
    Route::get('/register/step2',  [RegisterStep2Controller::class, 'create'])->name('register.step2');
    Route::post('/register/step2', [RegisterStep2Controller::class, 'store'])->name('register.step2.store');

    Route::get('/weight_logs', [WeightController::class, 'index'])->name('weight_logs.index');

});



Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

