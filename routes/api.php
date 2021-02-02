<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Usuários
 */

// Cadastra um novo usuário
Route::post('/usuarios/{id}', 'App\Http\Controllers\UserController@store')->name('store_usuario  ');

// Mostra todos os usuarios cadastrados
Route::get('/usuarios', 'App\Http\Controllers\UserController@index')->name('index_usuario');

// Mostra apenas um usuarios
Route::get('/usuarios/{id}', 'App\Http\Controllers\UserController@show')->name('single_usuario');

/**
 * Clientes
 */

// Cadastro de um cliente a um usuário.
Route::post('/clientes', 'App\Http\Controllers\ClienteController@store')->name('store_cliente');

// Mostra todos os clientes de um determinado usuário
Route::get('/clientes/{id}', 'App\Http\Controllers\ClienteController@show')->name('show_cliente');

// Atualiza um cliente
Route::patch('/clientes/{id}', 'App\Http\Controllers\ClienteController@update')->name('update_cliente');

// Apaga um cliente
Route::delete('/clientes/{id}', 'App\Http\Controllers\ClienteController@delete')->name('update_delete');

/**
 * Veiculos
 */

// Cadastra um novo veiculo para um cliente
Route::post('/veiculos', 'App\Http\Controllers\VeiculoController@store')->name('store_veiculo');

// Mostra os veiculos de um determinado cliente
Route::get('/clientes/veiculos/{id}', 'App\Http\Controllers\VeiculoController@show')->name('show_veiculo');

// Apaga um carro de um cliente
Route::delete('/veiculos/{id}', 'App\Http\Controllers\VeiculoController@delete')->name('delete_veiculo');

/**
 * JWT login token
 */
Route::group([
    'middleware' => 'api'
], function($router) {
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
});
