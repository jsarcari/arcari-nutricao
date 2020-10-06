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

Route::get('/', 'PacienteController@index');

// Rotas para pacientes:
Route::resource('/pacientes', 'PacienteController');
Route::post('/pacientes/delete/{paciente}', 'PacienteController@destroy');
Route::post('/pacientes/edit/{paciente}', 'PacienteController@update');

// Rotas para consultas:
Route::resource('/consultas', 'ConsultaController');
Route::post('/consultas/delete/{consulta}', 'ConsultaController@destroy');
Route::post('/consultas/edit/{consulta}', 'ConsultaController@update');