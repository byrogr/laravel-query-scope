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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buscar', "UsuariosController@index")->name('buscar');
Route::get('/crear', "UsuariosController@create")->name('crear');
Route::post('/subir', "UsuariosController@store")->name('subir');
