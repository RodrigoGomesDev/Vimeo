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
    return view('auth.login');
});

Route::get('/adminlte', function () {
    return view('adminlte');
});

Route::get('/form-video', function(){
    return view('form-video');
})->name('home');

Route::any('users/search', 'HomeController@search')->name('users.search');

Route::resource('users-list', 'UserAdminController')->middleware('is_admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('teste','HomeController');

Route::get('/admin', 'HomeController@adminHome')->name('admin')->middleware('is_admin');
Route::get('/profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('/profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);


Route::put('/users/update', 'HomeController@update');


Route::put('/profile/edit/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


Route::delete('users-list/delete/{id}', 'UserAdminController@destroy')->name('users-list.delete');

//Rotas de login/logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Rotas de registro
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('admin', 'Auth\RegisterController@showRegistrationAdminForm')->name('admin')->middleware('is_admin');
// Route::post('register', 'Auth\RegisterController@register');
Route::post('admin', 'Auth\RegisterController@register');


Route::get('/users/{id}/edit/', 'HomeController@edit')->name('edit-name');
Route::put('users/{id}', 'HomeController@update')->name('users.update');



//Rotas para resetar o password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/index', function() {
    return view('index');
})->name('index');