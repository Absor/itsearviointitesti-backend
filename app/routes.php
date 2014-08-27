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



Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');

Route::group(array('prefix' => 'api'), function()
{
    Route::resource('tests', 'TestController', array('except' => array('create', 'edit')));
    Route::resource('tests.interpretations', 'InterpretationController', array('except' => array('create', 'edit')));
    Route::resource('tests.interpretations.claims', 'ClaimController', array('except' => array('create', 'edit')));
});