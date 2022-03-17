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

// Route::get('/', function () {
//     return view('frontend/mainpage');
// });
Route::get('/', 'PageController@index');
Route::get('frontend/blogspot/{blogspot}/tambah', 'PageController@show');
Route::get('frontend/blogspot/{blogspot}/detail', 'PageController@showdetail');
Route::post('frontend/tambahkomentar', 'PageController@tambahkomen');
Route::post('frontend/tambahtestimoni', 'PageController@tambahtestimoni');
Route::post('frontend/tambahreplykomentar', 'PageController@tambahreplykomen');



Route::get('/register', 'RegisterController@index')->middleware('auth');
Route::post('/register', 'RegisterController@store');
Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');


Route::get('Admin/blogspot', 'BlogspotController@index')->middleware('auth');
Route::get('Admin/blogspot/tambah', 'BlogspotController@create')->middleware('auth');
Route::post('Admin/blogspot/tambah', 'BlogspotController@store')->middleware('auth');
Route::get('Admin/blogspot/{blogspot}/edit', 'BlogspotController@edit')->middleware('auth');
Route::get('Admin/blogspot/{blogspot}/lihat', 'BlogspotController@show')->middleware('auth');
Route::put('Admin/blogspot/{blogspot}/', 'BlogspotController@update')->middleware('auth');
Route::delete('Admin/blogspot/{blogspot}', 'BlogspotController@destroy')->middleware('auth');






