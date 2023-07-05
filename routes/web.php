<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('/post', [PostController::class, 'store'])->middleware('auth')->name('post.store');
Route::get('/posts/view/{slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts/{slug}/comment', [PostController::class, 'add_comment'])->middleware('auth')->name('post.add_comment');
Route::post('/posts/{slug}/like', [PostController::class, 'like_post'])->middleware('auth')->name('post.like');

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
