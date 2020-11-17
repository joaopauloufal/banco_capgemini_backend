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


Route::group(['prefix'=>'v1'], function () {
    Route::resource('agencias', AgenciaController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('contas', ContaController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', RoleController::class);

    Route::group(['prefix'=>'conta'], function () {
        Route::post('{id}/depositar', 'TransacaoContaController@depositar');
        Route::post('{id}/sacar', 'TransacaoContaController@sacar');
    });
});

