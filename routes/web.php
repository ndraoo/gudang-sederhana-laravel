<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/
Route::get('/barangs/statistics', [BarangController::class, 'statistics'])->name('barangs.statistics');

Route::put('/barangs/update', 'App\Http\Controllers\BarangController@update')->name('barangs.update');
Route::get('/barangs/create', 'App\Http\Controllers\BarangController@create')->name('barangs.create');

Route::get('/barangs/index', 'App\Http\Controllers\BarangController@index')->name('barangs.index');
Route::POST('/barangs/store', 'App\Http\Controllers\BarangController@store')->name('barangs.store');
Route::DELETE('/barangs/destroy', 'App\Http\Controllers\BarangController@destroy')->name('barangs.destroy');
Route::get('/barangs/show', 'App\Http\Controllers\BarangController@show')->name('barangs.show');
Route::get('/barangs/edit', 'App\Http\Controllers\BarangController@edit')->name('barangs.edit');
Route::resource('barangs', BarangController::class);

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:editor']], function () {
        Route::resource('editor', AdminController::class);
    });
});
