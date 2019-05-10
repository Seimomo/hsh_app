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

Route::get('/', 'PageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/avatar', 'HomeController@dispAvatar');

Route::post('/avatar_upload', 'HomeController@uploadAvatar');

Route::get('profile', 'Auth\EditController@getProfile');
Route::post('profile', 'Auth\EditController@postProfile');


Route::resource('jobs', 'JobController')->only([
    'index', 'store'
]);

Route::get('/list', 'PageController@list');
Route::get('/job/{id}', 'PageController@show');

Route::resource('subscribes', 'SubscribeController')->only([
    'index', 'show', 'store'
]);

Route::get('/portfolios', 'PortfolioController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/get_portfolio/{id}', 'PortfolioController@getUserPortfolio');
    
    Route::get('/get_portfolio', 'PortfolioController@getPortfolio');
    
    Route::get('/show_portfolio/{id}', 'PortfolioController@showPortfolio');
    
    Route::post('/update_portfolio', 'PortfolioController@updatePortfolio');
    
});