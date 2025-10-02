<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::get('/login', [AuthController::class, 'getLoginPage'])
    ->name('login.page');

Route::post('/contacts', [ContactController::class, 'create'])->name('create');

Route::group(['auth:sanctum', 'middleware' => IsAdmin::class], function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/contacts', [ContactController::class, 'getAllContacts'])->name('getAllContacts');
    Route::get('/contacts/{id}', [ContactController::class, 'getcontactById'])->name('getcontactById');
    Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('deleteContact');
});

