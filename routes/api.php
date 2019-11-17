<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** MOnta o JSON */
Route::get('produtos/lista', 'ListaController@index');

/** Retorna Pesquisa */
Route::resource('/produtos', 'ListaController');

/** Apontando Post para o Controlador */
Route::post('/pedidos/store', 'PedidosController@store');

