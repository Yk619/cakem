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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::group([
    'namespace' => 'Backend',
    'middleware' => ['auth'],
], function () {

    /*--------------HomeController ---------------------*/

    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    Route::get('/home', [
        'as' => 'home',
        'uses' => 'DashboardController@index',
    ]);


    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'DashboardController@logout',
    ]);
    
    /*--------------Cake Controller ---------------------*/

     Route::get('cakes/{id?}', [
        'as' => 'cakes',
        'uses' => 'CakeController@index',
    ]);

    Route::get('cake/form/{id?}', [
        'as' => 'cake.form',
        'uses' => 'CakeController@form',
    ]);

    Route::post('cake/save', [
        'as' => 'cake.create',
        'uses' => 'CakeController@create',
    ]);
    Route::post('cake/save/{id}', [
        'as' => 'cake.update',
        'uses' => 'CakeController@update',
    ]);

     Route::get('cake/show/{id}', [
        'as' => 'cake.show',
        'uses' => 'CakeController@show',
    ]);
    
     Route::get('cake/delete/{id}', [
        'as' => 'cake.delete',
        'uses' => 'CakeController@delete',
    ]);

    Route::get('orders/{id?}', [
        'as' => 'orders',
        'uses' => 'OrderController@index',
    ]);
});

