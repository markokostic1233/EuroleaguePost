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

//use Illuminate\Routing\Route;

Route::get('/', 'HomeController@home')
->name('home')
->middleware('auth');

Route::get('/secret', 'HomeController@players')
->name('secret')
->middleware('can:home.secret');

Route::post('/secretmadrid', 'MadridController@secretmadrid')->name('secretmadird');
// ->middleware('can:home.secret');
Route::get('/realm', 'MadridController@real')
->name('realm');


Route::get('/pla', 'HomeController@players')
->name('pla');




Route::post('/secret', 'HomeController@secret')
->name('secret')
->middleware('can:home.secret');



Route::get('/contact', 'HomeController@contact')->name('contact');
Route::resource('/teams', 'TeamController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
