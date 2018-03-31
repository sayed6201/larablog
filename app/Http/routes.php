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
    Route::get('admin/users','AdminUsersController@index');
    Route::get('admin/users/create','AdminUsersController@create');
    Route::post('admin/users/store','AdminUsersController@store');
    Route::get('/admin/users/edit/{id}','AdminUsersController@edit');
    Route::patch('/admin/users/update/{id}','AdminUsersController@update');
    Route::delete('/admin/users/delete/{id}','AdminUsersController@destroy');
} );

