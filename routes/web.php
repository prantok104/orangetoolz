<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();  // Auth Routes

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard'); // Dashboard route

    Route::resource('categories', CategoryController::class); // Category routes
    Route::resource('tags', TagsController::class); // Tags routes
    Route::resource('todo', TodoController::class); // Todo routes
    Route::resource('users', UserController::class); // Users routes
    Route::resource('task', TaskController::class); // Task routes
    Route::post('task/order', [TaskController::class, 'order'])->name('task.order'); // Task order
    Route::resource('trash', TrashController::class); // Trash routes
    Route::post('trash/restore', [TrashController::class, 'restore'])->name('trash.restore'); // Trash routes
    Route::get('system-restart', [HomeController::class, 'systemRestart'])->name('system.restart'); // System restart
});
