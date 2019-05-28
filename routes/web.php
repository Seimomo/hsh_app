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

// top
Route::get('/', 'PageController@index');

Auth::routes();

// login, register後
Route::get('/home', 'HomeController@index')->name('home');

// 規約
Route::get('/rule', 'RuleController@index');

// アバター登録画面表示
Route::get('/avatar', 'HomeController@dispAvatar');

// アバター登録
Route::post('/avatar_upload', 'HomeController@uploadAvatar');

// プロフィール表示
Route::get('profile', 'Auth\EditController@getProfile');
// プロフィール登録
Route::post('profile', 'Auth\EditController@postProfile');

// 依頼内容登録
Route::resource('jobs', 'JobController')->only([
    'index'
]);

Route::post('/jobs1', 'JobController@store');
Route::post('/jobs2', 'JobController@store');

// 完了した仕事一覧
Route::get('/showdone', 'JobController@showdone');

// 依頼内容一覧
Route::get('/list', 'PageController@list');
// 依頼内容詳細
Route::get('/job/{id}', 'PageController@show');

// 応募一覧
Route::resource('subscribes', 'SubscribeController')->only([
    'index', 'show', 'store'
]);

// 作成者一覧
Route::get('/portfolios', 'PortfolioController@index');

// ポートフォリオ表示（作成者一覧から）
Route::get('/get_userportfolio/{id}', 'PortfolioController@getMessagePortfolio');
    
Route::group(['middleware' => 'auth'], function() {
    // ポートフォリオ表示（応募者一覧から）
    Route::get('/get_portfolio/{id}', 'PortfolioController@getUserPortfolio');
    
    // ポートフォリオフォーム表示（ポートフォリオ編集から）
    Route::get('/get_portfolio', 'PortfolioController@getPortfolio');
    
    // ポートフォリオフォーム表示（ログインユーザ
    Route::get('/show_portfolio/{id}', 'PortfolioController@showPortfolio');
    // ポートフォリオフォーム更新（ログインユーザ
    Route::post('/update_portfolio', 'PortfolioController@updatePortfolio');
    
    // メッセージング
    Route::get('/message', 'MessageController@message');
    Route::post('/send', 'MessageController@send');
    
    // メッセージフォーム表示
    Route::get('/message_form/{id}', 'MessageController@form');
    
    // メッセージ詳細表示
    Route::get('/message_detail/{id}', 'MessageController@detail');
    
    // メッセージ返信
    Route::get('/message_resform/{user_id}/{message_id}', 'MessageController@resform');
    
});

Route::get('contact', 'ContactsController@index');
Route::post('contact/confirm', 'ContactsController@confirm');
Route::post('contact/complete', 'ContactsController@complete');