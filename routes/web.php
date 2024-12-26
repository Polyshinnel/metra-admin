<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TelegramApp\IndexController;
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
    Route::get('/dealers/{user}', [\App\Http\Controllers\DealersController::class, 'show']);
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index']);

    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/create', [NewsController::class, 'create']);

    Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index']);
    Route::get('/sertificates', [\App\Http\Controllers\SertificatesController::class, 'index']);
});

Route::get('/telegram-site', \App\Http\Controllers\TelegramApp\IndexController::class);
Route::post('/telegram-auth',  \App\Http\Controllers\TelegramApp\AuthController::class);
Route::get('/telegram-site/success', \App\Http\Controllers\TelegramApp\SuccessController::class);

Route::post('/notification/create', [\App\Http\Controllers\NotificationController::class, 'createNotifications']);
Route::post('/notification/update/{notification}', [\App\Http\Controllers\NotificationController::class, 'publishNotification']);
Route::post('/notification/delete/{notification}', [\App\Http\Controllers\NotificationController::class, 'deleteNotification']);
