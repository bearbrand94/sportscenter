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
Auth::routes();
//Login Register
Route::get('/login', function () {
    return view('classimax.login');
})->name('login');
Route::get('oauth2/login','LoginController@oauth2_login_google')->name('validate_oauth2');
Route::post('/login','LoginController@email_login')->name('email-login');
Route::get('/logout','LoginController@log_out')->name('logout');

//debug function.
Route::get('/check', 'LoginController@check_data');
Route::get('/login/data', 'LoginController@login_data');

Route::get('/register', function () {
    return view('classimax.register');
})->name('register');
Route::post('/register','LoginController@register')->name('register');
//End Login

Route::group(['middleware' => ['api']], function() {

});

//Profile
Route::group(['middleware' => ['initial_data']], function() {
	Route::get('/profile', function () {
	    return view('classimax.user-profile');
	})->name('profile');
	Route::get('/profile/edit', function (){
		return view('classimax.edit-profile');
	})->name('edit-profile');
	Route::get('/profile/setting', function (){
		return view('classimax.setting-profile');
	})->name('setting-profile');

	Route::post('/profile/password','ProfileController@change_password')->name('change-password');
	Route::post('/profile/update','ProfileController@update_profile')->name('update-profile');
	Route::post('/profile/upload/image','ProfileController@upload_image')->name('upload-image');
	Route::get('/profile/password', function () {
	    return view('classimax.user-profile');
	})->name('change-password');
});
//End Profile

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index')->name('home');

Route::post('/field/search','FieldController@search')->name('field-search');
//Favorit
Route::get('/favorit', 'FieldController@favorit')->name('favorit');
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






