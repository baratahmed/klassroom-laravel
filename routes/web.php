<?php

use Illuminate\Support\Facades\Route;

Route::get('/test/{id}/{name?}','TestController@index')->name('test');
Route::get('/','Frontend\FrontendController@index')->name('home');
Route::get('/post','Frontend\FrontendController@post');
Route::get('/verify/{token}','Frontend\FrontendController@verifyEmail')->name('verify');
Route::get('/last/login/setdate','Frontend\FrontendController@lastLoginSetDate')->name('last-login-setdate');

Route::get('/register','AuthController@showRegistrationForm')->name('register');
Route::post('/register','AuthController@processRegistration')->name('process-register');
Route::get('/login','AuthController@showLoginForm')->name('login');
Route::post('/login','AuthController@processLogin')->name('process-login');
Route::get('/logout','AuthController@logout')->name('logout');
Route::get('/dashboard','AuthController@dashboard')->name('dashboard');
Route::get('/profile','AuthController@showProfile')->name('profile');
// Route::get('/mark/as/read','AuthController@markAsReadNotification')->name('mark-as-read-notification');

//Category Routes
Route::get('/categories','Backend\CategoryController@index')->name('categories');
Route::get('/categories/create','Backend\CategoryController@create')->name('category.create');
Route::post('/categories/store','Backend\CategoryController@store')->name('category.store');
Route::get('/categories/show/{id}','Backend\CategoryController@show')->name('category.show');
Route::get('/categories/edit/{id}','Backend\CategoryController@edit')->name('category.edit');
Route::put('/categories/update/{id}','Backend\CategoryController@update')->name('category.update');
Route::delete('/categories/delete/{id}','Backend\CategoryController@destroy')->name('category.delete');


//Posts Routes
Route::resource('/posts','Backend\PostController');
