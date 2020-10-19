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
Route::get('/estatisticas', 'PacienteController@calculaEstatisticas')->name('pacientes.estatisticas');

// Rotas para pacientes:
Route::get('/pacientes', 'PacienteController@index')->name('pacientes.index');
Route::get('/pacientes/{paciente}/edit', 'PacienteController@edit')->name('pacientes.edit');
Route::get('/pacientes/create', 'PacienteController@create')->name('pacientes.create');
Route::post('/pacientes', 'PacienteController@store')->name('pacientes.store');
Route::post('/pacientes/delete/{paciente}', 'PacienteController@destroy');
Route::post('/pacientes/edit/{paciente}', 'PacienteController@update');
Route::put('/pacientes/{paciente}', 'PacienteController@update')->name('pacientes.update');
Route::delete('/pacientes/{paciente}', 'PacienteController@destroy')->name('pacientes.destroy');

// Rotas para consultas:
Route::get('/consultas', 'ConsultaController@index')->name('consultas.index');
Route::get('/consultas/{consulta}/edit', 'ConsultaController@edit')->name('consultas.edit');
Route::get('/consultas/create/{paciente?}', 'ConsultaController@create')->name('consultas.create');
Route::post('/consultas', 'ConsultaController@store')->name('consultas.store');
Route::post('/consultas/delete/{consulta}', 'ConsultaController@destroy');
Route::post('/consultas/edit/{consulta}', 'ConsultaController@update');
Route::put('/consultas/{consulta}', 'ConsultaController@update')->name('consultas.update');
Route::delete('/consultas/{consulta}', 'ConsultaController@destroy')->name('consultas.destroy');