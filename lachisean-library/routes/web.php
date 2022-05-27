<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [BookController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('books', BookController::class);
Route::get('/books/cat/{category_id}', [BookController::class, 'indexByCategory'])->name('books.cat');
Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::resource('category', CategoryController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/unblock/{id}', [UserController::class, 'unblock'])->middleware(['auth'])->name('users.unblock');
Route::resource('reviews', ReviewController::class)->middleware(['auth']);
Route::resource('admins', AdminController::class)->middleware(['auth']);