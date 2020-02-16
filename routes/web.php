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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/', 'Auth\LoginController@login');
Route::post('/deconnexion', 'Auth\LoginController@logout');

Route::get('/accueil', 'AccueilController@index');

Route::get('/enveloppe', 'EnveloppeController@index');
Route::post('/enveloppe', 'EnveloppeController@create');

Route::get('/sachet', 'SachetController@index');
Route::post('/sachet', 'SachetController@create');

Route::get('carton', 'CartonController@index');
Route::post('carton', 'CartonController@create');

Route::get('colis', 'ColisController@index');
Route::post('colis', 'ColisController@create');

Auth::routes();
