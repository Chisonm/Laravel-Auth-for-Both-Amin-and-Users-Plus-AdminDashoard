<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::namespace('App\Http\Controllers')->group(function () {
    // user home
    Route::get('/home', 'HomeController@index')->name('home');


    Route::prefix('admin')->group(function () {
        Route::middleware(['auth','admin'])->group(function () {
            Route::get('dashboard', 'HomeController@adminHome')->name('admin.index');
        });
    });
});
