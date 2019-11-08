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

Route::get('/', array('as' => 'home','uses'=> function () {
    //return "Index";
    return view('home');
}));
/* Rutas de usuario */
Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));
Route::get('/registrar',array('as' =>'usuarios.registrar', 'uses'=> 'UserController@registrar'));
Route::get('/perfil', array('as' => 'usuarios.perfil', 'uses' => 'UserController@perfil'));

/* rutas oferta */
Route::get('/ofertas', array( 'as'=> 'ofertas.lista', 'uses'=>  'OfertasController@ListaOfertas'));
Route::get('/busqueda', array('as' =>'ofertas.busqueda', 'uses' => 'OfertasController@BusquedaAvanzada'));
Route::get('/veroferta', array('as' =>'ofertas.veroferta', 'uses' => 'OfertasController@VerOferta'));
Route::get('/postulaciones',array('as' =>'postulaciones', 'uses' => 'OfertasController@Postulaciones'));


Route::get('/registrousuario', 'UserController@registro');
Route::post('/usuarios/crear', 'UserController@crear');
