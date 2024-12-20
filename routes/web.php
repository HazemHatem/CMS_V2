<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Home\HomeController;
use App\Http\Controllers\Site\Contact\ContactController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\Site\Article\ArticleController;
use App\Http\Controllers\Site\Comment\CommentController;
use App\Http\Controllers\Site\Like\LikeController;
use App\Http\Controllers\Site\Rating\RatingController;
use App\Http\Controllers\Site\Wishlist\WishlistController;
use App\Http\Controllers\Site\Author\Dashboard\DashboardController;
use App\Http\Controllers\Site\Author\Post\PostController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}/article', [CategoryController::class, 'article'])->name('category.article');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/articles/{article}/toggle-like', [LikeController::class, 'toggleLike'])->name('articles.toggle-like')->middleware('auth');
    Route::post('/articles/{article}/rate', [RatingController::class, 'rateArticle'])->name('articles.rate')->middleware('auth');
    Route::resource('/wishlist', WishlistController::class);
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

    Route::prefix('Author')->as('Author.')->middleware('author')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard.index');
        Route::resource('/post', PostController::class);
    });
});
