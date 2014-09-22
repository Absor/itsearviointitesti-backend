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

Route::group(array('prefix' => 'api'), function()
{
    Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
    Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
    Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');

    Route::resource('tests', 'TestController', array('except' => array('create', 'edit')));
    Route::resource('tests.interpretations', 'InterpretationController', array('except' => array('create', 'edit')));
    Route::resource('tests.completeds', 'CompletedController', array('except' => array('create', 'edit', 'show', 'update', 'destroy')));
    Route::resource('tests.interpretations.claims', 'ClaimController', array('except' => array('create', 'edit')));

    Route::resource('users', 'UserController', array('except' => array('create', 'edit', 'update')));

    Route::group(array('prefix' => 'password'), function() {
        Route::post('remind', 'UserController@postRemind');
        Route::post('reset', 'UserController@postReset');
    });
});