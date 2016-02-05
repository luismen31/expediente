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
Route::group(['middleware' => 'auth'], function(){

	/*
	* Filtra si es medico redirige a la vista de registro de citas,
	* si es admin redirige a la vista de registro de medicos.
	*/
	Route::get('/', ['middleware' => 'medico']);
	    
	Route::resource('medico', 'MedicoController');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::resource('cita', 'CitaController');
	Route::post('cita/nueva-cita/{id_paciente}', 'CitaController@nuevaCita');
	Route::get('ver-cita/{id_cita}', 'CitaController@showCita');
	Route::resource('historial', 'HistorialController');
	Route::controller('buscar', 'BuscarController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');