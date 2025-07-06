<?php

use App\Http\Controllers\CreateContactController;
use App\Http\Controllers\ListContactsController;
use App\Http\Controllers\DeleteContactController;
use App\Http\Controllers\UpdateContactController;
use Illuminate\Support\Facades\Route;


Route::post('/contacts', CreateContactController::class);
Route::get('/contacts', ListContactsController::class);
Route::delete('/contacts/{id}', DeleteContactController::class);
Route::put('/contacts/{id}', UpdateContactController::class);
