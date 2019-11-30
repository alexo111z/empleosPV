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

//Route::get('/login', 'LoginController@index')->name('login');
//Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));
//Empresas - nope
Route::get('/empresas', 'EmpresaController@list')->name('emp.show');
Route::get('/empresas/registro', 'EmpresaController@registro')->name('emp.registro');
Route::post('/empresas/crear', 'EmpresaController@crear')->name('emp.create');
Route::get('/empresas/{empresa}/edit', 'EmpresaController@editar')->name('emp.edit');
Route::put('/empresas/{empresa}/{id}', 'EmpresaController@update')->name('emp.update');
//Admin
Route::get('/administrator',array('as' => 'admin.index', 'uses'=>'AdminController@index'));
Route::get('/administrator/emp',array('as' => 'admin.emp', 'uses'=>'AdminController@empresas'));
Route::get('/administrator/us',array('as' => 'admin.users', 'uses'=>'AdminController@usuarios'));

//Lupita
/* Rutas de usuario */
Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));
Route::post('/user/login', array('as' => 'usuarios.sesion', 'uses'=>'LoginController@loginUsuario'));

Route::get('/registrar',array('as' =>'usuarios.registrar', 'uses'=> 'UserController@registrar'));
Route::post('/usuarios/crear', array('as' => 'users.create', 'uses' => 'UserController@crear'));

Route::get('/perfil', array('as' => 'usuarios.perfil', 'uses' => 'UserController@perfil'));
Route::post('/perfil/Personal', array('as' => 'perfil.personal', 'uses' => 'UserController@editarPersonal'));
Route::post('/perfil/Contacto', array('as' => 'perfil.contacto', 'uses' => 'UserController@editarContacto'));
Route::post('/perfil/Academica', array('as' => 'perfil.academica', 'uses' => 'UserController@editarAcademica'));
Route::post('/perfil/Laboral', array('as' => 'perfil.laboral', 'uses' => 'UserController@editarLaboral'));

/* rutas oferta */
Route::get('/ofertas', array( 'as'=> 'ofertas.lista', 'uses'=>  'OfertasController@ListaOfertas'));
Route::get('/busqueda', array('as' =>'ofertas.busqueda', 'uses' => 'OfertasController@BusquedaAvanzada'));
Route::get('/veroferta/{oferta}', array('as' =>'ofertas.veroferta', 'uses' => 'OfertasController@VerOferta'));
Route::post('/solicitar/{oferta}', array('as' => 'oferta.solicitud', 'uses'=> 'OfertasController@solicitar'));
Route::post('/solicitar/{oferta}/cancelar', array('as' => 'oferta.solicitud.cancelar', 'uses'=> 'OfertasController@cancelarPostulacion'));
Route::get('/postulaciones',array('as' =>'postulaciones', 'uses' => 'OfertasController@Postulaciones'));

//Logout
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));  //logout en header.blade


//Pruebas
Route::get('/registrousuario', 'UserController@registro');  //Luis - eliminar
Route::post('/usuarios/crear', 'UserController@crear');   //Luis - eliminar
/*ofertas*/
Route::get('/ofertas/lista/{empresa}', 'OfertaController@show')->name('oferta.list');
Route::get('/ofertas/nueva/{empresa}', 'OfertaController@nueva')->name('oferta.nueva');
Route::post('/oferta/crear/{id}', 'OfertaController@create')->name('oferta.create');
/*GENERAL*/
Route::get('/ofertas2', 'OfertaController@general')->name('gen.list');
//Usuarios
Route::get('/usuarios/registro', 'UserController@registro')->name('users.registro');
Route::get('/usuarios/{user}/editar', 'UserController@editar')->name('users.editPage');
Route::put('/usuarios/{user}/{id}', 'UserController@update')->name('users.update');