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

Route::get('pools', 'mainController@pools');
Route::get('terminos', 'mainController@terminos');

Route::get('dashboard', 'HomeController@dashboard');
Route::get('poolsuser', 'HomeController@poolsuser');
Route::get('deposit', 'HomeController@deposit');
Route::get('withdraw', 'HomeController@withdraw');
Route::get('transactions', 'HomeController@transactions');


Route::post('deposittigomoney','HomeController@deposittigomoney');
Route::post('depositcuenta','HomeController@depositcuenta');
Route::post('depositbtc','HomeController@depositbtc');
Route::post('retirar','HomeController@retirar');

//API
Route::post('userlogin','APIController@userlogin');
Route::post('usertransactions','APIController@usertransactions');
Route::post('userbalance','APIController@userbalance');
Route::post('usernotify','APIController@usernotify');