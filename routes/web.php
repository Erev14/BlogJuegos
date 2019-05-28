<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Manera uno de hacer la creacion de rutas
Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@find');
});
*/

/*
 * Manera 2 Hacer la creacion de rutas
 Route::resource('users', 'UserController');
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'haveProfile', 'isAdmin']], function () {
    Route::resource('users', 'UserController')->only([
        'index', 'show',
    ]);
});

Route::group(['prefix' => 'app', 'middleware' => ['auth', 'haveProfile']], function () {
    Route::resource('users', 'UserController')->except([
        'create'
    ]);
});
