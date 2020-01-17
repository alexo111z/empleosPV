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
  //  Route::get('/ofertas', 'API\apiController@ofertas');
  Route::get('/ofertas', array( 'as'=> 'api.ofertas', 'uses'=>  'API\apiController@ofertas'));
  Route::get('/oferta/{id}', array('as'=>'api.detalle','uses'=>'API\apiController@detalles'));
});
Route::post('/perfil', array('as'=>'api.perfil', 'uses'=> 'API\LoginController@perfil'));

//Route::get('/ofertas', array( 'as'=> 'api.ofertas', 'uses'=>  'API\apiController@ofertas'));

Route::post('/postular/{id}', array('as'=>'api.postular','uses'=>'API\apiController@postular'));
Route::post('/cancelar/{id}', array('as'=>'api.cancelar','uses'=>'API\apiController@cancelarPost'));

Route::post('/registrar', array('as'=>'api.newuser','user'=>'API\apiController@registro'));
Route::post('/perfil/editar', array('as'=>'api.editperfil','uses'=>'API\apiController@editarPerfil'));