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

Route::resource('/pacientes', 'PacienteController');
Route::resource('/consultas', 'ConsultaController');
Route::post('/pacientes/delete/{paciente}', 'PacienteController@destroy');
Route::post('/pacientes/edit/{paciente}', 'PacienteController@update');
