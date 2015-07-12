<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/control', function() { return View::make('control'); });
Route::get('/layouts/panel', function() { return View::make('layouts.panel'); });
Route::get('/layouts/usuarios', function() { return View::make('layouts.usuarios'); });
Route::get('/layouts/tipoorganizacion', function() { return View::make('layouts.tipoorganizacion'); });
Route::get('/layouts/organizacion', function() { return View::make('layouts.organizacion'); });
Route::get('/layouts/candidaturas', function() { return View::make('layouts.candidaturas'); });
Route::get('/layouts/puestos', function() { return View::make('layouts.puestos'); });
Route::get('/layouts/candidatos', function() { return View::make('layouts.candidatos'); });
Route::get('/layouts/logros', function() { return View::make('layouts.logros'); });
Route::get('/layouts/criterios', function() { return View::make('layouts.criterios'); });
Route::get('/layouts/criterioscandidatos', function() { return View::make('layouts.criterioscandidatos'); });
Route::get('/layouts/preguntas', function() { return View::make('layouts.preguntas'); });

Route::get('/', function()
{
	return View::make('login');
});

Route::group(array('prefix'=>'ws'), function()
{
	Route::resource('usuarios', 'UsuariosController');
	Route::get('login', 'UsuariosController@HacerLogin');
	Route::get('logout', 'UsuariosController@HacerLogout');

	Route::resource('tipoorganizacion', 'TipoOrganizacionController');

	Route::post('organizacion/editar/us', 'OrganizacionController@EditarOrganizacion');
	Route::resource('organizacion', 'OrganizacionController');

	Route::any('candidaturas/lista/partidos', 'CandidaturasController@ObtenerListado');
	Route::resource('candidaturas', 'CandidaturasController');

	Route::resource('puestos', 'PuestosController');

	Route::resource('paises', 'PaisesController');
	Route::resource('departamentos', 'DepartamentosController');
	Route::resource('municipios', 'MunicipiosController');

	Route::post('candidatos/editar/us', 'CandidatosController@EditarCandidato');
	Route::resource('candidatos', 'CandidatosController');

	Route::resource('logros', 'LogrosController');

	Route::resource('criterios', 'CriteriosController');

	Route::resource('criterioscandidatos', 'CriteriosCandidatosController');	

	Route::resource('preguntas', 'PreguntasController');	
});