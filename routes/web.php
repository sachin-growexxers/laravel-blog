<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


/* Route for post handling */
Route::get('/post/create', [PostController::class, 'create'])->middleware(['auth'])->name('create');

Route::post('/post/store', [PostController::class, 'store'])->middleware(['auth'])->name('store');

Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::get('/post/show/{id}', [PostController::class, 'show'])->middleware(['auth'])->name('show');

Route::put('/post/update/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('update');

Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('destroy');


/* Route for email handling */
Route::get('/email/sendMail', [EmailController::class, 'sendMail'])->middleware(['auth'])->name('sendMail');

/* Route for profile handling */
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile');

Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->middleware(['auth'])->name('update');


/* Route for category handling*/
Route::get('/category/{id}', [CategoryController::class, 'index'])->middleware(['auth'])->name('category');