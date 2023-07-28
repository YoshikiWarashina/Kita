<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\PasswordController;

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

//デザインチェック用
Route::get('/', function () {
    return view('articles.delete');
});

//done page 1,2,3,4,5,6,7,8
//done page 1,2,3,4,5,6,7,9,10

//admins middleware
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins']], function () {
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin/logout');
    Route::get('/admin_users', [AdminController::class, 'index']);
    Route::get('/admin_users_create', [AdminController::class, 'create'])->name('admin_users.create');
    Route::post('/admin_users', [AdminController::class, 'store'])->name('admin_users.store');
    Route::get('/admin_users/{id}/edit', [AdminController::class, 'edit'])->name('admin_users.edit');
    Route::delete('/admin_users/{id}', [AdminController::class, 'destroy'])->name('admin_users.destroy');
    Route::put('/admin_users/{id}', [AdminController::class, 'update'])->name('admin_users.update');
});


//admins middlewareなし
Route::group(['prefix' => 'admin'], function () {
    Route::view('/login', 'admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::view('/register', 'admin/register');
    Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, 'register'])->name('admin/register');
});

Route::get('/member_registration', [RegisterController::class, 'showRegistrationForm'])->name('member.register');
Route::post('/member_registration', [RegisterController::class, 'register'])->name('member.register');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//members middleware
Route::middleware(['auth:members'])->group(function () {
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/{article_id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/{article_id}/edit', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/{article_id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });

    // コメント投稿
    Route::post('/{article_id}/edit', [CommentController::class, 'store'])->name('comment.store');
    // プロフィール編集
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password_change',[PasswordController::class, 'update'])->name('password.update');
});


//articles関連 middlewareなし
Route::group(['prefix' => 'articles'], function () {

    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/', [ArticleController::class, 'search'])->name('article.search');
    //詳細表示
    Route::get('/{article_id}', [ArticleController::class, 'show'])->name('article.show');

});


