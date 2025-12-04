<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AuthController;

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

// Portfolio Routes
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/', 'index')->name('portfolio.index');
    Route::get('/projects', 'projects')->name('portfolio.projects');
    Route::get('/projects/{project}', 'show')->name('portfolio.show');
    Route::get('/contact', 'contact')->name('portfolio.contact');
    Route::post('/contact', 'storeContact')->name('portfolio.store-contact');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
    
    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('projects', ProjectController::class);
    });
});
