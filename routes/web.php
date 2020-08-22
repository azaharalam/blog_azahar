<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/bloglist','blogController@index');

Route::get('/addblog','blogController@create');

Route::post('/bloglist','blogController@store');

Route::get('/bloglist/{blog}','blogController@show');

Route::patch('/bloglist/{blog}','blogController@update');

Route::get('/bloglist/{blog}/edit','blogController@edit');

Route::delete('/bloglist/{blog}','blogController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/linkedin', 'Auth\LoginController@redirectToProvider');
Route::get('login/linkedin/callback', 'Auth\LoginController@handleProviderCallback');