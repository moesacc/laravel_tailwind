<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index'])->name('/');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::patch('/update', [PostController::class, 'update'])->name('post.update');
Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete');
