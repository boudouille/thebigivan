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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('projects','ProjectController');

Route::resource('collaborators','CollaboratorController');

Route::resource('sites','SiteController');

Route::post('ajaxSelectFields','AccessFieldController@show')->name('ajaxSelectFields');

//Different access types test connection
Route::post('mysql_test','MysqlController@testConnection')->name('mysql_test');


//Different type of connection
Route::resource('mysql','MysqlController');

//Different type of scripts
Route::resource('mysqlscripts','MysqlScriptsController');

Route::get('mysqlscript_execute/{id}','MysqlScriptsController@execute')->name('mysqlscript_execute');


