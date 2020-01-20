<?php

use Illuminate\Http\Request;
use App\User;
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
Route::get('/logos/{file}', 'API\apiController@logo');

Route::get('/usuarios/fotos/{id}', function($id){
    $user=User::findorFail($id);
    if(isset($user->foto)){
     return \Storage::disk('public')->response("/fotos/FotoPerfil_".$id.'.jpg');
    }else{
        return \Storage::disk('public')->response("/fotos/user.png");
    }
});
Route::group(['middleware' => ['cors']], function () {
    //Rutas de control de sesion
    Route::post('/login','API\LoginController@login');  
    Route::post('/logout', array('as'=>'api.logout', 'uses'=> 'API\LoginController@logout'));
    Route::post('/refresh', array('as'=>'api.refresh', 'uses'=> 'API\LoginController@refresh'));

    //Rutas de ofertas
    Route::get('/ofertas', array( 'as'=> 'api.ofertas', 'uses'=>  'API\apiController@ofertas'));
    Route::get('/oferta/{id}', array('as'=>'api.detalle','uses'=>'API\apiController@detalles'));
    Route::post('/postular/{id}', array('as'=>'api.postular','uses'=>'API\apiController@postular'));
    Route::post('/cancelar/{id}', array('as'=>'api.cancelar','uses'=>'API\apiController@cancelarPost'));
    

    //Rutas de usuario
    Route::get('/perfil/{id}', array('as'=>'api.perfil', 'uses'=> 'API\apiController@perfil'));
    Route::post('/registrar', array('as'=>'api.newuser','uses'=>'API\apiController@registro'));
    Route::post('/registro', array('as'=>'api.newuser','uses'=>'API\apiController@registrar'));
    Route::post('/perfil/editar', array('as'=>'api.editperfil','uses'=>'API\apiController@editarPerfil'));
    Route::get('/localidades', array('as'=>'api.lugares','uses'=>'API\apiController@Localidades'));
    
    Route::post('/edit/personales/{id}', array('as'=>'api.edit.personal','uses'=>'API\apiController@editarPersonal'));
    Route::post('/edit/localidad/{id}', array('as'=>'api.edit.localidad','uses'=>'API\apiController@editarLocalidad'));
    Route::post('/edit/laboral/{id}', array('as'=>'api.edit.laboral','uses'=>'API\apiController@editarLaboral'));
    Route::post('/edit/academica/{id}', array('as'=>'api.edit.academica','uses'=>'API\apiController@editarAcademica'));

    Route::get('/misofertas/{id}', array('as'=>'api.misofertas','uses'=>'API\apiController@misOfertas'));
    
});


