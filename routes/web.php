<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


use App\Http\Controllers\SingleController;
use Illuminate\Routing\RouteGroup;

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






Route::get('/', [HomeController::class, 'index']);
Route::get('single/{slug}', [SingleController::class, 'index']);

Route::get('logout', [logoutController::class, 'index']);
Route::post('logout', [logoutController::class, 'index']);

Route::get('login', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'save']);







