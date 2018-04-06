<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::auth();

//routes for admin
Route::group( ['middleware'=>'admin'],function (){
    //users route
    Route::get('admin/users','AdminUsersController@index');
    Route::get('admin/users/create','AdminUsersController@create');
    Route::post('admin/users/store','AdminUsersController@store');
    Route::get('/admin/users/edit/{id}','AdminUsersController@edit');
    Route::patch('/admin/users/update/{id}','AdminUsersController@update');
    Route::delete('/admin/users/delete/{id}','AdminUsersController@destroy');

    //posts route
    Route::resource('/admin/posts','AdminPostsController');
    Route::resource('/admin/posts/create','AdminPostsController@create');
    Route::post('/admin/posts/store','AdminPostsController@store');
    Route::get('/admin/posts/edit/{id}','AdminPostsController@edit');
    Route::delete('/admin/posts/delete/{id}','AdminPostsController@destroy');
    Route::get('/admin/posts/show/{id}','AdminPostsController@show');

    //catagories routes
    Route::get('/admin/catagories','AdminCatagoriesController@index');
    Route::get('/admin/catagories/create','AdminCatagoriesController@create');
    Route::post('/admin/catagories/store','AdminCatagoriesController@store');
    Route::get('/admin/catagories/edit/{id}','AdminCatagoriesController@edit');
    Route::post('/admin/catagories/update/{id}','AdminCatagoriesController@update');
    Route::delete('/admin/catagories/delete/{id}','AdminCatagoriesController@destroy');
} );

    Route::get('users/create','AdminUsersController@Usercreate');
    Route::post('users/store','AdminUsersController@Userstore');


Route::group( ['middleware'=>'user'], function(){

    //posts routes
    Route::get('posts/index','AdminPostsController@Userindex');
    Route::get('posts/show/{id}','AdminPostsController@Usershow');
    Route::get('posts/create','AdminPostsController@Usercreate');
    Route::post('posts/store','AdminPostsController@Userstore');
    Route::get('posts/edit/{id}','AdminPostsController@Useredit');
    Route::patch('posts/update/{id}','AdminPostsController@Userupdate');
    Route::delete('posts/delete/{id}','AdminPostsController@Userdestroy');

    //user routes
    Route::get('users/index', 'AdminUsersController@Userindex');
    Route::get('users/show', 'AdminUsersController@Usershow');
    Route::get('users/edit/{id}', 'AdminUsersController@Useredit');
    Route::patch('users/update/{id}', 'AdminUsersController@Userupdate');

} );



