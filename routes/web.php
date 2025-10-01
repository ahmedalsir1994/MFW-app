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

Route::post('/contacts', [ContactController::class, 'create']);

Route::group(['auth:sanctum', 'middleware' => IsAdmin::class], function () {
   
    Route::get('/contacts', [ContactController::class, 'getAllContacts']);
    Route::get('/contacts/{id}', [ContactController::class, 'getcontactById']);
    Route::delete('/contacts/{id}', [ContactController::class, 'delete']);
});

 Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');