<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// EmployeeController
Route::get('employee', [EmployeeController::class, 'index']);
Route::get('add-employee', [EmployeeController::class, 'create']);
Route::post('store-employee', [EmployeeController::class, 'store']);
Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::put('update-employee/{id}', [EmployeeController::class, 'update']);
Route::delete('delete-employee/{id}', [EmployeeController::class, 'destroy']);

// PostController
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('posts', PostController::class);
});
