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
Route::get('oauth2/login','LoginController@oauth2_login_google')->name('validate_oauth2');
Route::post('/login','LoginController@email_login')->name('email-login');
Route::get('/logout','LoginController@log_out')->name('logout');

Route::get('/login', function () {
    return view('classimax.login');
})->name('login');
Route::get('/register', function () {
    return view('classimax.register');
})->name('register');


Route::get('/','HomeController@index')->name('home');
Route::get('/home','HomeController@index')->name('home');

Route::get('/field', function () {
    return view('classimax.category');
});
Route::get('/field/detail', function () {
    return view('classimax.single');
});
Route::get('/field/list', function () {
    return view('classimax.category');
});
Route::get('/my-order', function () {
    return view('classimax.dashboard-my-order');
});

Route::post('/register','LoginController@register')->name('register');


Route::get('/profile', function () {
    return view('classimax.user-profile');
})->name('profile');
Route::post('/login','LoginController@email_login')->name('email-login'); 



