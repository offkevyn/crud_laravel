<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contacts-index');
    Route::get('/create', [ContactController::class, 'create'])->name('contacts-create');
    Route::post('/', [ContactController::class, 'store'])->name('contacts-store');
    Route::get('/{id}', [ContactController::class, 'show'])->where('id', '[0-9]+')->name('contacts-show');
    Route::get('/{id}/edit', [ContactController::class, 'edit'])->where('id', '[0-9]+')->name('contacts-edit');
    Route::put('/{id}', [ContactController::class, 'update'])->where('id', '[0-9]+')->name('contacts-update');
});