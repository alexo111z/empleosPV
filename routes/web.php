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
//Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));

//Usuarios
Route::get('/usuarios/registro', 'UserController@registro')->name('users.registro');

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
Route::get('/ofertas2', 'OfertaController@general')->name('gen.list');

Route::get('/registrousuario', 'UserController@registro');  //Luis - eliminar
Route::post('/usuarios/crear', 'UserController@crear');   //Luis - eliminar

/*--------- RUTAS DE USUARIO--------*/
Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));
Route::post('/user/login', array('as' => 'usuarios.sesion', 'uses'=>'LoginController@loginUsuario'));
Route::get('/registrar',array('as' =>'usuarios.registrar', 'uses'=> 'UserController@registrar'));
Route::post('/usuarios/crear', array('as' => 'users.create', 'uses' => 'UserController@crear'));
Route::get('/perfil', array('as' => 'usuarios.perfil', 'uses' => 'UserController@perfil'));
//Editar y añadir información al perfil//
Route::post('/perfil/addconocimientos','UserController@addConocimientos')->name('user.conocimientos');
Route::post('/perfil/nivelyarea','UserController@addNivelyArea')->name('user.nivelyarea');
Route::post('/perfil/actualizar','UserController@update')->name('user.actualizar');
Route::post('/perfil/contacto','UserController@addContacto')->name('user.contacto');
Route::post('/perfil/privacidad','UserController@privacidad')->name('user.privacidad');
Route::post('/subirCV','UserController@subirCV')->name('subirCV');
Route::get('/borrarCV','UserController@borrarCV')->name('borrarCV');
Route::get('/descargar/curriculums/{file}', function($file){
    return \Storage::disk('public')->download("/curriculums/$file");
});
Route::post('/subirFoto','UserController@subirFoto')->name('subirFoto');
Route::get('/perfil/fotos/{file}', function($file){
    return \Storage::disk('public')->response("/fotos/$file");
});
//añadir tags al perfil de usuario
Route::post('/perfil/createtags', 'TagsController@Insert')->name('tags.insert');
Route::post('/perfil/deletetags','TagsController@destroy')->name('tags.destroy');
//Logout
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));  //is in header.blade
/*--------- FIN RUTAS DE USUARIO--------*/

/* ---------RUTAS DE OFERTAS------- */
Route::get('/ofertas', array( 'as'=> 'ofertas.lista', 'uses'=>  'OfertasController@ListaOfertas'));
Route::get('/veroferta/{oferta}', array('as' =>'ofertas.veroferta', 'uses' => 'OfertasController@VerOferta'));
Route::post('/solicitar/{oferta}', array('as' => 'oferta.solicitud', 'uses'=> 'OfertasController@solicitar'));
Route::post('/solicitar/{oferta}/cancelar', array('as' => 'oferta.solicitud.cancelar', 'uses'=> 'OfertasController@cancelarPostulacion'));
Route::get('/postulaciones',array('as' =>'postulaciones', 'uses' => 'OfertasController@Postulaciones'));
//Busqueda avanzada
Route::get('/busqueda', array('as' =>'ofertas.busqueda', 'uses' => 'OfertasController@BusquedaAvanzada'));
Route::post('/ofertas/busqueda-de','OfertasController@BuscarAvanzado');
Route::get('/ofertas/busqueda-de','OfertasController@BuscarAvanzado');
//busqueda simple
Route::post('/ofertas/buscar','OfertasController@Buscar')->name('ofertas.buscar');
Route::get('/ofertas/buscar','OfertasController@Buscar')->name('ofertas.buscar');
/* ---------FIN RUTAS DE OFERTAS------- */




