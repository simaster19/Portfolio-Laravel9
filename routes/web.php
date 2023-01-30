<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [WebController::class, 'index']);
Route::get('/work/{id}', [WebController::class, 'show']);
Route::post('/send', [WebController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Route Project
    Route::get('/project', [ProjectController::class, 'index']);
    Route::get('/project/create', [ProjectController::class, 'create']);
    Route::post('/project', [ProjectController::class, 'store']);
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit']);
    Route::patch('/project/{id}', [ProjectController::class, 'update']);
    Route::get('/project/detail/{id}', [ProjectController::class, 'show']);
    Route::delete('/project/{id}', [ProjectController::class, 'destroy']);

    //Route Message
    Route::get('/message', [MessageController::class, 'index']);
    Route::get('/message/detail/{id}', [MessageController::class, 'show']);
    Route::delete('/message/{id}', [MessageController::class, 'destroy']);
});


Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
