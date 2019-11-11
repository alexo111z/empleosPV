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

Route::get('/login', 'LoginController@index')->name('login');

//Usuarios
Route::get('/usuarios/registro', 'UserController@registro')->name('users.registro');
Route::post('/usuarios/crear', 'UserController@crear')->name('users.create');

Route::get('/usuarios/{user}/editar', 'UserController@editar')->name('users.editPage');
Route::put('/usuarios/{user}/{id}', 'UserController@update')->name('users.update');

//Empresas
Route::get('/empresas', 'EmpresaController@list')->name('emp.show');

Route::get('/empresas/registro', 'EmpresaController@registro')->name('emp.registro');
Route::post('/empresas/crear', 'EmpresaController@crear')->name('emp.create');

Route::get('/empresas/{empresa}/edit', 'EmpresaController@editar')->name('emp.edit');
Route::put('/empresas/{empresa}/{id}', 'EmpresaController@update')->name('emp.update');

//ofertas
Route::get('/ofertas/lista/{empresa}', 'OfertaController@show')->name('oferta.list');

Route::get('/ofertas/nueva/{empresa}', 'OfertaController@nueva')->name('oferta.nueva');
Route::post('/oferta/crear/{id}', 'OfertaController@create')->name('oferta.create');

//GENERAL
Route::get('/ofertas', 'OfertaController@general')->name('gen.list');


//Lupita
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

