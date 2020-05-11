<?php

use Illuminate\Support\Facades\Auth;
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

use Illuminate\Support\Facades\Route;

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
// Route::get('/', 'SpaController@index');

Route::get('test', function () {
    return view('test');
});
Route::resource('products', 'ProductController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('register', 'SpaController@register');
Route::post('login', 'SpaController@login');
