<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/books/create', [BookController::class, 'create'])->name('create');
Route::post('/books/create', [BookController::class, 'store'])->name('book.create');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/books/update', [BookController::class, 'update'])->name('book.update');
Route::post('/books/delete', [BookController::class, 'delete'])->name('books.delete');


