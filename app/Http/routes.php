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
Route::auth();
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login',['as' => 'login_post', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/home', 'HomeController@index');


Route::get('/informe', ['as' => 'informe', 'uses' => 'informeController@informe']);
Route::get('/addcart', ['as' => 'addcart', 'uses' => 'cartController@index']);




Route::group(array('middleware' => 'role:admin'), function() {
    Route::get('admin', ['as' => 'admin', 'uses' => 'UserAdminController@index']);
    Route::get('user/add', ['as' => 'user', 'uses' => 'UserAdminController@add']);
    Route::get('user/edit/{id}', ['as' => 'edit', 'uses' => 'UserAdminController@edit']);

    Route::post('user/', ['as' => 'user-create', 'uses' => 'UserAdminController@create']);
    Route::post('user/{id}', ['as' => 'user-update', 'uses' => 'UserAdminController@update']);
    Route::delete('user/{id}', ['as' => 'user-delete', 'uses' => 'UserAdminController@delete']);
});

Route::group(array('middleware' => ['auth']), function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('cliente', ['as' => 'cliente', 'uses' => 'clienteController@index']);
    Route::get('cliente/nuevo', ['as' => 'cliente-nuevo', 'uses' => 'clienteController@add']);
    Route::post('cliente', ['as' => 'cliente-guardar', 'uses' => 'clienteController@save']);

    Route::get('set-menu-mini/{mini}', function($mini){
        Session::put('menu-mini', $mini);
    });


});


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {

    $api->group(['namespace'=> 'App\Http\Controllers\Api\V1'], function($api) {
        $api->post('auth/authorize', 'OAuthController@authorizeClient');

        $api->group(['middleware'=> 'api.auth'], function($api) {
            $api->get('me', 'ProfileController@index');

            $api->get('user', 'apiUserController@index');
            $api->post('user', 'apiUserController@create');
            $api->get('user/{id}', 'apiUserController@getUser');
            $api->post('user/{id}', 'apiUserController@update');
            $api->delete('user/{id}', 'apiUserController@delete');
        });
        /*$api->group(['middleware'=> 'role:admin'], function($api) {

        });*/
    });
});

Route::resource('categorias', 'CategoriasController');
Route::resource('modo_pagos', 'Modo_pagosController');
Route::resource('proveedores', 'ProveedoresController');
Route::resource('productos', 'productosController');
Route::resource('clientes', 'clientesController');