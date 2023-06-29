<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('user.changepass');
});

//done page 1,2,3,4,5,6,7,8
//done page 1,5,10


Route::group(['prefix' => 'admin'], function () {
    Route::get('/admin_users', 'AdminController@index');
    Route::get('/admin_users/create', 'AdminController@create')->name('admin_users.create');
    Route::post('/admin_users', 'AdminController@store')->name('admin_users.store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
