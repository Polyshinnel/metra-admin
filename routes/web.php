<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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



Route::get('/auth', \App\Http\Controllers\LoginController::class);

Route::post('/auth', AuthController::class);

Route::middleware([\App\Http\Middleware\CheckUser::class])->group(function(){
    Route::get('/', HomeController::class);

    Route::get('/dealers', [\App\Http\Controllers\DealersController::class, 'index']);
});
