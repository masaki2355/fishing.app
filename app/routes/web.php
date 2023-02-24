<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\UsersController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\CommentController;



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



Auth::routes();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');
Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');
Route::post('/result/ajax/', 'CommentController@ajaxComment')->name('ajax.comment');



Route::get('/', 'PostController@index');
Route::get('/post_delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/user_index', 'AdminController@userIndex')->name('user.index');
Route::get('/comment_index/{id}', 'AdminController@commentIndex')->name('comment.index');
Route::get('/user_delete/{id}', 'AdminController@userDelete')->name('user.delete');
Route::get('/comment_delete/{id}', 'AdminController@commentDelete')->name('comment.delete');



