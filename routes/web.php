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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
	Route::get('/', 'Web\ManageController@dashboard')->name('manage.dashboard');
	Route::get('/banks', 'Web\ManageController@list_banks')->name('manage.banks');
	Route::post('/add_bank', 'Web\ManageController@add_bank')->name('manage.add_bank');
	Route::put('/assign_role/{id}', 'Web\UsersController@assign_role')->name('assign_role');
	Route::put('/detach_role/{id}', 'Web\UsersController@detach_role')->name('detach_role');
	Route::resource('/users', 'Web\UsersController');
	
	//Route::post('/mail_invoice/{id}', 'SendMailController@mail_invoice');

	

});

