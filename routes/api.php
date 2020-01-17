<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', array('as'=>'api.login', 'uses'=> 'API\LoginController@login'));
Route::post('/logout', array('as'=>'api.logout', 'uses'=> 'API\LoginController@logout'));
Route::post('/refresh', array('as'=>'api.refresh', 'uses'=> 'API\LoginController@refresh'));


Route::group(['middleware' => ['cors']], function () {
    Route::get('/ofertas', 'API\apiController@ofertas');
});