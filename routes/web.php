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

//Front
Route::get('/', 'FrontController@renderHome');
Route::get('/author','FrontController@author');
Route::get('/contact','FrontController@contact');
Route::post('/support','FrontController@support');
Route::get('/search','FrontController@search');
Route::get('/paginationSearch','FrontController@paginationSearch');
Route::get('/categoryFilter','FrontController@categoryFilter');
Route::get('/paginatinCategory','FrontController@paginatinCategory');

//Cart zastiti da se ne moze pristupiti ukoliko nije ulogovan
Route::get('/cart','CartController@renderCart');
Route::post('/addToCart','CartController@addToCart');
Route::post('/removeFromCart','CartController@remove');
Route::post('/buy','CartController@buy');

Route::get('/moreInfo/{id}', 'BookController@show');

//Auth
Route::get('/login','AuthController@renderLogin');
Route::get('/register','AuthController@renderRegister');
Route::get('/logout','AuthController@logout');
Route::get('/verification/{token}','AuthController@verification');
Route::post('/login','AuthController@login');
Route::post('/register','AuthController@register');

//Admin
Route::get('/admin','AdminController@renderAdmin');

Route::get('/addUserForm','UserController@create');
Route::get('/manageUsers','UserController@index');
Route::post('/addUser','UserController@store');
Route::get('/deleteUser/{id}','UserController@destroy');
Route::get('/updateForm/{id}','UserController@edit');
Route::post('/updateUser/{id}','UserController@update'); //ovde ide ajax update !!!!!!!!1

Route::get('/renderErrors','ErrorController@renderError');
Route::get('/errorCSV','ErrorController@exportCSV');

Route::get('/renderActivity','ActivityController@renderActivity');
Route::get('/activityCSV','ActivityController@exportCSV');