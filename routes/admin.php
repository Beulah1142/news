<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\AdminController;
use Illuminate\Routing\RouteGroup;
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




Route::group(['middleware'=>['auth']],function () {
    
    Route::get('register', [SignupController::class, 'index']);
    Route::post('register', [SignupController::class, 'save']);

    Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth']);
    
    Route::get('admin/post', [AdminController::class, 'post']);
    
    Route::get('admin/post/{type}', [AdminController::class, 'post']);
    Route::post('admin/post/{type}', [AdminController::class, 'post']);
    
    Route::get('admin/post/{type}/{id}', [AdminController::class, 'post']);
    Route::post('admin/post/{type}/{id}', [AdminController::class, 'post']);
    
    Route::get('admin/category', [AdminController::class, 'category']);
    
    Route::get('admin/category/{type}', [AdminController::class, 'category']);
    Route::post('admin/category/{type}', [AdminController::class, 'category']);
    
    Route::get('admin/category/{type}/{id}', [AdminController::class, 'category']);
    Route::post('admin/category/{type}/{id}', [AdminController::class, 'category']);
    
      Route::get('admin/users', [AdminController::class, 'users']);
    
    Route::get('admin/users/{type}', [AdminController::class, 'users']);
    Route::post('admin/users/{type}', [AdminController::class, 'users']);
    
    Route::get('admin/users/{type}/{id}', [AdminController::class, 'users']);
    Route::post('admin/users/{type}/{id}', [AdminController::class, 'users']); 
    
    //Route::Resource('admin/dashboard',AdminController::class)->only(['index'])->middleware(['auth']);

    //Route::resource('admin/users',AdminController::class)->only(['users']);
       
        
    });