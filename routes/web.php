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

Route::get('/', function () {
    return view('classimax.index');
});
Route::get('/field', function () {
    return view('classimax.category');
});
Route::get('/field/detail', function () {
    return view('classimax.single');
});
Route::get('/field/list', function () {
    return view('classimax.category');
});
Route::get('/login', function () {
    return view('classimax.login');
});
Route::get('/register', function () {
    return view('classimax.register');
});
Route::get('/home', function () {
    return view('classimax.index');
});