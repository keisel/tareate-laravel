<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middlewareGroups' => ['web']], function () {

 	route::get('/','VistaController@inicio');
 	route::get('Iniciar-sesion','VistaController@iniciarSesion');
 	route::get('historial-tareas','VistaController@historialTareas'); 
 	route::get('aviso-de-privacidad','VistaController@avisoPrivacidad');
 	route::get('terminos-y-condiciones','VistaController@terminosCondiciones');
 	route::get('nuevo-usuario','VistaController@nuevoUsuario');
 	route::get('quienes-somos','VistaController@quienesSomos');
	route::get('preguntas-frecuentes','VistaController@preguntasFrecuentes');
	route::get('contacto','VistaController@contacto');

	Route::post('buscar-tarea', 
                ['as' => 'buscar-tarea', 'uses' => 'VistaController@buscarTarea']); 


 route::get('donwload-file/{id}', ['as' => 'donwload-file', 'uses' => 'HomeController@downloadFile']);

  route::get('view-File/{id}', ['as' => 'view-File', 'uses' => 'HomeController@viewFile']);
 

 route::get('donwload-tarea/{id}', ['as' => 'donwload-tarea', 'uses' => 'HomeController@downloadTarea']);



  route::get('vista-previa/{id}', ['as' => 'vista-previa', 'uses' => 'HomeController@vistaPrevia']);

 route::get('listall/{page?}','HomeController@listall');
 route::get('historial/{page?}','VistaController@historial');

 Route::post('password/{id}', ['as' => 'cambiarPassword', 'uses' => 'UsuarioController@cambiarPass']);

route::resource('tarea','TareaController');
route::resource('mail','MailController');
route::resource('usuario','UsuarioController');
route::resource('compartir','SubirTareaController');
Route::get('administra', 'HomeController@admin');
 // crea las cetegorias de las tareas aun no lo hecho esto es para mi ventana admin
 route::resource('categoria','CategoriaController');

// ruta para mandarle el correo de la nueva coontraseña
Route::post('resetEmail', ['as' => 'reset-email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
// ruta para cambiar la contraseña
Route::post('resetPassword', ['as' => 'reset-password', 'uses' => 'Auth\PasswordController@reset']);

	route::get('quienes-somos','VistaController@quienesSomos');
});
 Route::auth();

Route::get('/home', 'HomeController@index');

