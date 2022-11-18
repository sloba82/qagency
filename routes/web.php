<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthUserController;

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
    return view('index');
})->name('home');;

Route::get('/login', [AuthUserController::class, 'index'])->name('auth.index');
Route::get('/logOut', [AuthUserController::class, 'logOut'])->name('auth.logOut');
Route::post('/login', [AuthUserController::class, 'login'])->name('auth.login');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/author/books/{id}', [AuthorController::class, 'show'])->name('author.show');
    Route::delete('/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    
    Route::delete('/book/{book}/delete/author/{author}', [BookController::class, 'delete'])->name('book.delete');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
});




