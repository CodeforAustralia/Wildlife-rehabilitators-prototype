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
    return view('auth/login');
});


Auth::routes();

Route::get('/welcome', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/timetable', 'TimetableController@index');
Route::post('/timetable', 'TimetableController@store');

Route::get('/species_exp', 'SpeciesExpController@index')->name('species_exp');
Route::post('/species_exp', 'SpeciesExpController@store');

Route::get('/coverage_area', 'CoverageAreaController@index')->name('converage_area');
Route::put('/coverage_area', 'CoverageAreaController@update');

Route::get('/profile', 'UserProfileController@index')->name('profile');
Route::get('/profile/show', 'UserProfileController@show')->name('profile.show');
Route::put('/profile/update', 'UserProfileController@update')->name('profile.update');
