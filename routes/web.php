<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/contacts', [ContactController::class, 'create']);

Route::group(['auth:sanctum', 'middleware' => IsAdmin::class], function () {
    Route::get('/contacts', [ContactController::class, 'getAllContacts']);
    Route::get('/contacts/{id}', [ContactController::class, 'getcontactById']);
    Route::delete('/contacts/{id}', [ContactController::class, 'delete']);
});

