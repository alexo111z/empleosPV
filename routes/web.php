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
|--------------------------------------------------------------------------
| Ruta ejemplo (predeterminada)
|--------------------------------------------------------------------------
*/
Route::get('/ejemplo', function () {
    return view('welcome');
});

Route::get('/', function () {
    //return "Index";
    return view('home');
})->name('home');

Route::get('/login', 'LoginController@index')->name('login');

Route::get('/usuario/registro', 'UserController@registro')->name('users.registro');
Route::post('/usuario/crear', 'UserController@crear');
