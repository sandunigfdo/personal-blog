<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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


// Route::middleware('guest')->group(function () {
//     Route::get('/', [PostController::class, 'index'])->name('posts.index');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/{post:id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::post('posts/{post:id}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('categories/{category:id}', [CategoryController::class, 'index'])->name('category.index');

});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('authors/{author:id}', [UserController::class, 'index'])->name('author.index');

});


// Route::resource('posts', PostController::class)->only(['index', 'store', 'create', 'edit', 'update', 'show'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
