<?php

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

Route::get('/', [\App\Http\Controllers\AddressController::class, 'index'])->name('address_form');
Route::post('/save/address', [\App\Http\Controllers\AddressController::class, 'save'])->name('save_address');
Route::get('/delete/address/{id}', [\App\Http\Controllers\AddressController::class, 'delete'])->name('delete_address');
