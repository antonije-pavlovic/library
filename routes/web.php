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
Route::get('/moreInfo/{id}', 'FrontController@showBook');

//Auth
Route::get('/login','AuthController@renderLogin');
Route::get('/register','AuthController@renderRegister');
Route::get('/logout','AuthController@logout');
Route::get('/verification/{token}','AuthController@verification');
Route::post('/login','AuthController@login');
Route::post('/register','AuthController@register');

/***** Cart ********/
Route::group(['middleware'=>['loginCheck']],function (){
    Route::get('/cart','CartController@renderCart');
    Route::post('/addToCart','CartController@addToCart');
    Route::post('/removeFromCart','CartController@remove');
    Route::post('/buy','CartController@buy');
});
/*****Admin panel********/
Route::group(['middleware'=> ['adminCheck']], function (){

    Route::get('/admin','AdminController@renderAdmin');
    Route::get('/unauthorized','AdminController@unauthorized');
//user
    Route::get('/addUserForm','UserController@create');
    Route::get('/manageUsers','UserController@index');
    Route::post('/addUser','UserController@store');
    Route::get('/deleteUser/{id}','UserController@destroy');
    Route::get('/updateForm/{id}','UserController@edit');
    Route::post('/updateUser/{id}','UserController@update');
    Route::get('/userActivity/{id}','UserController@show');
//book
    Route::get('/addBookForm','BookController@create');
    Route::post('/uploadBook','BookController@store');
    Route::get('/manageBooks','BookController@index');
    Route::get('/updateBookForm/{id}','BookController@edit');
    Route::post('/updateBook/{id}','BookController@update');
    Route::post('/deleteBook/{id}','BookController@destroy');
//error
    Route::get('/renderErrors','ErrorController@renderError');
    Route::get('/errorCSV','ErrorController@exportCSV');

//activity
    Route::get('/renderActivity','ActivityController@renderActivity');
    Route::get('/activityCSV','ActivityController@exportCSV');
    Route::get('/userActivityCSV/{id}','ActivityController@userActivityCSV');
    Route::post('/activityDate','ActivityController@activityDate');

//category
    Route::get('/addCategoryForm','CategoryController@create');
    Route::get('/manageCategory','CategoryController@index');
    Route::post('/addCategory','CategoryController@store');
    Route::get('/deleteCategory/{id}','CategoryController@destroy');
    Route::get('/updateCategoryForm/{id}','CategoryController@edit');
    Route::post('/updateCategory','CategoryController@update');

//author
    Route::get('/addAuthorForm','AuthorController@create');
    Route::post('/addAuthor','AuthorController@store');
    Route::get('/manageAuthor','AuthorController@index');
    Route::get('/deleteAuthor/{id}','AuthorController@destroy');
    Route::get('/updateAuthorForm/{id}','AuthorController@edit');
    Route::post('/updateAuthor','AuthorController@update');
});
