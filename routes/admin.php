<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Author\AuthorController;
use App\Http\Controllers\Admin\Article\ArticleController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Rule\RuleController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Wishlist\WishlistController;

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




Route::as('Admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('user', UserController::class);
    Route::get('/contact', ContactController::class)->name('contact');
    Route::resource('profile', ProfileController::class);
    Route::patch('/profile/{profile}/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::resource('setting', SettingController::class);
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    Route::middleware('manager')->group(function () {
        Route::resource('admin', AdminController::class);
        Route::resource('rule', RuleController::class);
    });
});
