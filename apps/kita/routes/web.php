<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Article\ArticleController;

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
    return view('articles.detail');
});

//done page 1,2,3,4,5,6,7,8
//done page 1,2,3,4,5,6,7,9,10


Route::group(['prefix' => 'admin'], function () {
    Route::view('/login', 'admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin/logout')->middleware('auth:admin');
    Route::view('/register', 'admin/register');
    Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, 'register'])->name('admin/register');

    Route::get('/admin_users', [AdminController::class, 'index'])->middleware('auth:admin');
    Route::get('/admin_users_create', [AdminController::class, 'create'])->name('admin_users.create')->middleware('auth:admin');
    Route::post('/admin_users', [AdminController::class, 'store'])->name('admin_users.store')->middleware('auth:admin');
    Route::get('/admin_users/{admin_user}/edit', [AdminController::class, 'edit'])->name('admin_users.edit')->middleware('auth:admin');
});

Route::group(['prefix' => ''], function () {
    Route::get('/member_registration', [RegisterController::class, 'showRegistrationForm'])->name('member.register');
    Route::post('/member_registration', [RegisterController::class, 'register'])->name('member.register');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});



Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/', [ArticleController::class, 'search'])->name('article.search');
    //middlewareの処理、後ほど対応
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/{article_id}/edit', [ArticleController::class, 'show'])->name('article.show');
});





