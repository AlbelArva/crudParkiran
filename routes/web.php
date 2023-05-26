<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;

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


Route::get('/', [ParkirController::class, 'index'])->name('parkir.index');
Route::get('/create', [ParkirController::class, 'create'])->name('parkir.create');
Route::post('/store', [ParkirController::class, 'store'])->name('parkir.store');
Route::get('/edit{id}', [ParkirController::class, 'edit'])->name('parkir.edit');
Route::put('/update/{id}', [ParkirController::class, 'update'])->name('parkir.update');
Route::delete('/delete/{id}', [ParkirController::class, 'destroy'])->name('parkir.destroy');

