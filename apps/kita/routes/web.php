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

Route::post('/logout', [App\Http\Controllers\auth\LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/login', 'admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin/logout');
    Route::view('/register', 'admin/register');
    Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, 'register'])->name('admin/register');
//    Route::view('/admin_users', 'admin/admin_users')->middleware('auth:admin');


    Route::get('/admin_users', 'App\Http\Controllers\Admin\AdminController@index')->middleware('auth:admin');
    Route::get('/admin_users_create', 'App\Http\Controllers\Admin\AdminController@create')->name('admin_users.create')->middleware('auth:admin');
    Route::post('/admin_users', 'App\Http\Controllers\Admin\AdminController@store')->name('admin_users.store')->middleware('auth:admin');

    Route::get('/admin_users', [AdminController::class, 'index'])->middleware('auth:admin');
    Route::get('/admin_users_create', [AdminController::class, 'create'])->name('admin_users.create')->middleware('auth:admin');
    Route::post('/admin_users', [AdminController::class, 'store'])->name('admin_users.store')->middleware('auth:admin');
    Route::get('/admin_users/{admin_user}/edit', [AdminController::class, 'edit'])->name('admin_users.edit')->middleware('auth:admin');
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/', [ArticleController::class, 'search'])->name('article.search');
});


//Route::view('/admin/login', 'admin/login');
//Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
//Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout'])->name('admin/logout');
//Route::view('/admin/register', 'admin/register');
//Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
//Route::view('/admin/admin_users', 'admin/admin_users')->middleware('auth:admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

