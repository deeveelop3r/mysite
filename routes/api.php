<?php

use App\Http\Controllers\Api\ProjectApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group.
|
*/

// Public API endpoints
Route::prefix('v1')->group(function () {
    Route::controller(ProjectApiController::class)->group(function () {
        Route::get('/projects', 'index');
        Route::get('/projects/featured', 'featured');
        Route::get('/projects/technology/{tech}', 'byTechnology');
        Route::get('/projects/{project}', 'show');
        Route::get('/stats', 'stats');
    });
});

// Protected routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
