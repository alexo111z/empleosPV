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

Route::get('/', array('as' => 'home','uses'=> function () {
    //return "Index";
    return view('home');
}));



/*---------[   RUTAS DE ADMINISTRADOR   ]--------*/
//Admin
Route::get('/administrator/login/admins',array('as'=>'admin.v.login', 'uses'=>'AdminLoginController@login'));
Route::post('/administrator/login/admins',array('as'=>'admin.login', 'uses'=>'AdminLoginController@autenticar'));
Route::post('/administrator/logout/admin',array('as'=>'admin.logout', 'uses'=>'AdminLoginController@logout'));
/*Recuperar contraseña admins*/
Route::get('/administrator/contrasena/recuperar',array('as'=>'admin.view.preset','uses'=>'AdminForgotPasswordController@showLinkRequestForm'));
Route::post('/administrator/contrasena/email',array('as'=>'admin.r.email','uses'=>'AdminForgotPasswordController@sendResetLinkEmail'));
Route::get('/administrator/contrasena/recuperar/{token}',array('as'=>'admin.r.token','uses'=>'AdminResetPasswordController@showResetForm'));
Route::post('/administrator/contrasena/recuperar',array('as'=>'admin.r.resset','uses'=>'AdminResetPasswordController@reset'));

Route::get('/administrator',array('as' => 'admin.index', 'uses'=>'AdminController@index'));
Route::get('/administrator/empresas',array('as' => 'admin.emp', 'uses'=>'AdminController@empresas'));
Route::get('/administrator/ususarios',array('as' => 'admin.users', 'uses'=>'AdminController@usuarios'));
Route::get('/administrator/empresas/ofertas/{empresa}', array('as' => 'admin.emp.ofr', 'uses'=>'AdminController@empOfertas'));
Route::get('/administrator/administradores', array('as'=>'admin.admins', 'uses'=>'AdminController@administradores'));

Route::get('/administrator/registro/administrador', array('as'=>'admin.reg.admin','uses'=>'AdminController@regAdministrador'));
Route::get('/administrator/registro/usuario', array('as'=>'admin.reg.user','uses'=>'AdminController@regUser'));
Route::get('/administrator/registro/empresa', array('as'=>'admin.reg.emp','uses'=>'AdminController@regEmpresa'));
Route::get('/administrator/registro/oferta/{empresa}', array('as'=>'admin.reg.ofr','uses'=>'AdminController@regOferta'));

Route::get('/administrator/detalles/usuario/{usuario}', array('as'=>'admin.det.user','uses'=>'AdminController@detUser'));
Route::get('/administrator/detalles/empresa/{empresa}', array('as'=>'admin.det.emp','uses'=>'AdminController@detEmpresa'));

Route::get('/administrator/detalles/empresa2/{empresa}', array('as'=>'admin.det.emp2','uses'=>'AdminController@detEmpresa2'));

Route::get('/administrator/detalles/oferta/{oferta}', array('as'=>'admin.det.ofr','uses'=>'AdminController@detOferta'));
Route::post('/administrator/detalles/oferta/{oferta}', array('as'=>'admin.edit.ofr','uses'=>'AdminController@editOferta'));

Route::post('/administrator/create/empresa', array('as'=>'admin.c.emp','uses'=>'AdminController@createEmpresa'));
Route::post('/administrator/create/usuario', array('as'=>'admin.c.user','uses'=>'AdminController@createUser'));
Route::post('/administrator/create/administrador', array('as'=>'admin.c.admin','uses'=>'AdminController@createAdmin'));
Route::post('/administrator/create/oferta/{empresa}', array('as'=>'admin.c.ofer', 'uses'=>'AdminController@createOferta'));
Route::get('/logos/{file}', function($file){
    return \Storage::disk('public')->response("/logos/$file");
})->name('empresas.logo');

/*--------- FINRUTAS DE ADMINISTRADOR--------*/




/*--------- [   RUTAS DE USUARIO    ]--------*/
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
})->name('usuarios.foto');
Route::post('/borrarfoto','UserController@borrarFoto')->name('borrarFoto');
//añadir tags al perfil de usuario
Route::post('/perfil/createtags', 'TagsController@Insert')->name('tags.insert');
Route::post('/perfil/deletetags','TagsController@destroy')->name('tags.destroy');
//Logout
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));  //is in header.blade
Route::post('/user/pass','UserController@editarpassword')->name('editarpassword');
//reset password
Route::post('/password/email', 'UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('/password/reset', 'UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('/password/reset', 'UserResetPasswordController@reset');
Route::get('/password/reset/{token}', 'UserResetPasswordController@showResetForm')->name('user.password.reset');
/*--------- FIN RUTAS DE USUARIO--------*/


/* ---------[    RUTAS DE OFERTAS    ]------- */
Route::get('/ofertas/lista/{empresa}', 'OfertaController@show')->name('oferta.list');
Route::get('/ofertas/nueva/{empresa}', 'OfertaController@nueva')->name('oferta.nueva');
Route::post('/oferta/crear/{id}', 'OfertaController@create')->name('oferta.create');
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

/* ---------[RUTAS DE EMPRESAS]------- */

Route::get('/empresas/home','EmpresaController@Index')->name('empresas.index');
Route::post('empresas/Contacto','EmpresaController@ActualizarContacto')->name('empresas.contacto');
Route::get('/empresas/registrar','EmpresaController@Registrar')->name('empresas.registrar');
Route::post('/empresas/crear-empresa', 'EmpresaController@createEmpresa')->name('empresas.crear'); 
Route::get('/empresas/login','EmpresaController@login')->name('empresas.login');
Route::post('/empresas/login',array('as'=>'empresas.post-login', 'uses'=>'EmpresaLoginController@autenticar'));
Route::get('/empresas/perfil','EmpresaController@perfil')->name('empresas.perfil');
Route::post('empresas/Datos','EmpresaController@ActualizarDatos')->name('empresas.datos');
Route::post('/subirLogo','EmpresaController@subirLogo')->name('subirLogo');
Route::post('/borrarlogo','EmpresaController@borrarlogo')->name('borrarlogo');
Route::post('/empresa/pass','EmpresaController@editarpassword')->name('newpassword');
Route::post('/empresa/confirmpass','EmpresaController@verificarpass')->name('verificarpassword');
Route::post('empresas/baja','EmpresaController@deleteemp')->name('deleteemp');
Route::get('/empresas/logout',array('as'=>'empresas.logout', 'uses'=>'EmpresaLoginController@logout'));
Route::get('empresas/mis-ofertas','EmpresaController@MisOfertas')->name('misofertas');
Route::get('empresas/veroferta/{oferta}', array('as' =>'empresas.veroferta', 'uses' => 'EmpresaController@VerOferta'));
Route::post('/empresas/mis-ofertas/buscar','EmpresaController@Buscar')->name('empresas.buscar');
Route::get('/empresas/mis-ofertas/buscar','EmpresaController@Buscar')->name('empresas.buscar');
Route::get('/empresas/registro/oferta','EmpresaController@regOferta')->name('empresas.nueva-oferta');
//Route::get('/empresas/registro/oferta', array('as'=>'nueva-oferta','uses'=>'EmpresaController@regOferta'));
/* ---------FIN RUTAS DE Empresas------- */

//Logout
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));  //logout en header.blade



//RUTAS DE PRUEBA O TEMPORALES
Route::get('/registrousuario', 'UserController@registro');  //Luis - eliminar
Route::post('/usuarios/crear', 'UserController@crear');   //Luis - eliminar

/*/GENERAL*/
Route::get('/ofertas2', 'OfertaController@general')->name('gen.list');

Route::get('/registrousuario', 'UserController@registro');  //Luis - eliminar
Route::post('/usuarios/crear', 'UserController@crear');   //Luis - eliminar
Route::get('/ofertas2', 'OfertaController@general')->name('gen.list');
//Usuarios
Route::get('/usuarios/registro', 'UserController@registro')->name('users.registro');
Route::get('/usuarios/{user}/editar', 'UserController@editar')->name('users.editPage');
Route::put('/usuarios/{user}/{id}', 'UserController@update')->name('users.update');

//Route::get('/login', 'LoginController@index')->name('login');
//Route::get('/login',array('as' => 'usuarios.login', 'uses'=>'LoginController@index'));
//Empresas - nope
Route::get('/empresas', 'EmpresaController@list')->name('emp.show');
Route::get('/empresas/registro', 'EmpresaController@registro')->name('emp.registro');
Route::post('/empresas/crear', 'EmpresaController@crear')->name('emp.create');
Route::get('/empresas/{empresa}/edit', 'EmpresaController@editar')->name('emp.edit');
Route::put('/empresas/{empresa}/{id}', 'EmpresaController@update')->name('emp.update');


/*
Route::post('/password/email', 'UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('/password/reset', 'UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('/password/reset', 'UserResetPasswordController@reset');
Route::get('/password/reset/{token}', 'UserResetPasswordController@showResetForm')->name('user.password.reset');
*/