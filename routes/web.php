<?php

use App\Http\Controllers\CreateContactController;
use App\Http\Controllers\ListContactsController;
use App\Http\Controllers\DeleteContactController;
use App\Http\Controllers\UpdateContactController;
use App\Http\Controllers\InertiaContactsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::post('/contacts', CreateContactController::class);
Route::get('/contacts', ListContactsController::class);
Route::delete('/contacts/{id}', DeleteContactController::class);
Route::put('/contacts/{id}', UpdateContactController::class);

Route::get('/', [InertiaContactsController::class, 'index'])->name('contacts.index');
Route::get('/register', [InertiaContactsController::class, 'create']);
Route::post('/', [InertiaContactsController::class, 'store']);
Route::get('/edit/{id}/', [InertiaContactsController::class, 'edit'])->name('contacts.edit');
Route::put('/edit/{id}', [InertiaContactsController::class, 'update'])->name('contacts.update');

