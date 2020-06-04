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

Route::get('/help', function (){
	return view('classimax.help-center');
})->name('help-center');

Route::get('/about-us', function (){
	return view('classimax.about');
})->name('about-us');

Route::get('/terms', function (){
	return view('classimax.terms');
})->name('terms');

Route::group(['middleware' => ['api']], function() {
	//Midtrans
	Route::post('/midtrans/notification/handling', 'MidtransController@notification');
	Route::post('/midtrans/finish', 'MidtransController@finish');
	Route::post('/midtrans/unfinish', 'MidtransController@unfinish');
	Route::post('/midtrans/error', 'MidtransController@error');
});

//Group Must Logged In.
Route::group(['middleware' => ['initial_data']], function() {
	//Profile
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
	Route::post('/profile/update/phone','ProfileController@update_phone')->name('update-phone');
	Route::post('/profile/update/email','ProfileController@update_email')->name('update-email');
	Route::post('/profile/upload/image','ProfileController@upload_image')->name('upload-image');
	Route::get('/profile/password', function () {
	    return view('classimax.user-profile');
	})->name('change-password');

	//Favorit
	Route::get('/favorit', 'FieldController@favorit')->name('favorit');
	Route::post('ajax/set-favorit', 'FieldController@set_favorit')->name('set-favorit');

	//Booking
	Route::post('/booking/confirmation','BookingController@confirmation')->name('booking-confirmation');
	
	Route::post('/booking/create','BookingController@create')->name('booking-create');
	Route::get('/booking', 'BookingController@show')->name('booking-list');
	// Post mode is for midtrans redirect after completing booking payment.
	Route::post('/booking', 'BookingController@show')->name('booking-list');
	Route::get('/booking/{id}', 'BookingController@detail')->name('booking-detail');

});
//End Group
Route::post('/booking/apply','BookingController@apply_coupon')->name('apply-coupon');
Route::post('/booking/snap', 'BookingController@get_snap_url')->name('booking-snap');

Route::group(['middleware' => ['api']], function() {
	Route::get('/payment/finish', 'BookingController@create')->name('payment-finish');
	Route::get('/payment/pending', 'BookingController@create')->name('payment-pending');
	Route::post('/payment/notification', 'MidtransController@notif')->name('snap-notif');
});

Route::get('/home','HomeController@index');
Route::get('/','HomeController@index')->name('home');
Route::get('/filter/recommendation','FieldController@recommendation')->name('search-recommendation');

Route::get('/search/result','FieldController@search')->name('field-search');
Route::get('/search', 'FieldController@navbarFormSearch')->name('navbar-form-search');

Route::get('/field', function () {
    return view('classimax.category');
});

//Field
Route::get('/field/{slug}','FieldController@detail')->name('field-detail');
Route::get('/field/{slug}/court','FieldController@court')->name('select-court');
Route::get('/field/list', function () {
    return view('classimax.category');
})->name('field-list');

Route::get('/promo','PromoController@list')->name('promo-list');
Route::get('/promo/{id}','PromoController@detail')->name('promo-detail');
Route::get('/events','EventController@list')->name('event-list');
Route::get('/event/{id}','EventController@detail')->name('event-detail');