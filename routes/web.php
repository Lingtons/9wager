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

//ADMIN
Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
	Route::get('/', 'Web\ManageController@dashboard')->name('manage.dashboard');
	Route::get('/banks', 'Web\ManageController@list_banks')->name('manage.banks');
	Route::post('/add_bank', 'Web\ManageController@add_bank')->name('manage.add_bank');
	Route::put('/assign_role/{id}', 'Web\UsersController@assign_role')->name('assign_role');
	Route::put('/detach_role/{id}', 'Web\UsersController@detach_role')->name('detach_role');
	Route::resource('/users', 'Web\UsersController');
	Route::get('/bets/{type}', 'Web\BetsController@bets')->name('manage.bets');
	Route::get('/transactions/{type}', 'Web\AccountsController@transactions')->name('manage.transactions');
	Route::get('/checkout/{code}', 'Web\ProcessController@checkout')->name('manage.checkout');
	Route::put('/verify_bet/{id}', 'Web\ProcessController@verify_bet')->name('verify_bet');
	Route::post('/reward_bet', 'Web\ProcessController@reward_bet')->name('manage.reward_bet');
});

//BANK
Route::prefix('bank')->middleware('role:bank_user')->group(function () {
	Route::get('/', 'Web\ManageBankController@dashboard')->name('bank.dashboard');
	Route::post('/new_deposit', 'Web\ManageBankController@new_deposit')->name('bank.new_deposit');
	Route::get('/transactions', 'Web\ManageBankController@list')->name('bank.list');
});

//AUTH
Route::prefix('user')->middleware('auth')->group(function () {
	Route::resource('/accounts', 'Web\AccountsController');
	Route::post('/new_game', 'Web\BetsController@new_game')->name('user.new_game');
	Route::get('/new_bet', 'Web\BetsController@create_game')->name('user.create_game');
	Route::get('/bets', 'Web\BetsController@user_bets')->name('bet_list');
	Route::get('/find_bet', 'Web\BetsController@find_bet')->name('find_bet');
	Route::get('/view_bet/{id}', 'Web\BetsController@view_bet')->name('view_bet');
	Route::post('/join_bet', 'Web\BetsController@join_bet')->name('join_bet');
	Route::post('/search_bet', 'Web\BetsController@search_bet')->name('search_bet');
});
