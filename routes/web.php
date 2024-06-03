<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

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

Route::get('/', [TareaController::class, 'index']);
Route::post('/', [TareaController::class, 'store']);
Route::delete('/{id}', [TareaController::class, 'destroy'])->name('tarea.destroy');
