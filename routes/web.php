<?php

use App\Http\Controllers\PostController;
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

Route::get('/post/create', [PostController::class, 'create']);

Route::post('/post/store', [PostController::class, 'store']);

Route::get('/post/edit/{id}', [PostController::class, 'edit']);

Route::get('/post/show/{id}', [PostController::class, 'show']);

Route::put('/post/update/{id}', [PostController::class, 'update']);

Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);