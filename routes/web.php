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

// No Rules
Route::get('logout', 'LoginController@logout');
Route::get('register', 'LoginController@register');
Route::post('do-register', 'LoginController@doRegister');

// Rules Before Login
Route::middleware(['authcheck'])->group(function() {
    Route::get('/login', 'LoginController@index');
    Route::post('/do-login', 'LoginController@doLogin');
});

// Rules After Login
Route::middleware(['authlogedin'])->group(function(){
    Route::get('/', 'HomeController@index');

    /*
    * ====================================
    * ADMIN SESSION
    * ====================================
    */

    // Users
    Route::get('/users', 'UserController@index');
    Route::get('/add-users', 'UserController@create');
    Route::post('/do-add-users', 'UserController@store');
    Route::get('/edit-users/{id}', 'UserController@show');
    Route::post('/do-update-users/{id}', 'UserController@update');
    Route::get('/delete-users/{id}', 'UserController@destroy');

    Route::get('/user-points', 'UserController@listPoints');
    Route::post('/update-user-point/{id}', 'UserController@updatePoints');
    Route::get('/reset-point/{id}', 'UserController@resetPoints');
    Route::get('/user-leaderboard', 'UserController@leaderBoard');
    Route::get('/reset-leaderboard', 'UserController@resetLeaderboard');

    // Category
    Route::get('/category', 'CategoryController@index');
    Route::get('/add-category', 'CategoryController@create');
    Route::post('/do-add-category', 'CategoryController@store');
    Route::get('/edit-category/{id}', 'CategoryController@show');
    Route::post('/do-update-category/{id}', 'CategoryController@update');
    Route::get('/delete-category/{id}', 'CategoryController@destroy');

    // Book
    Route::get('/book', 'BookController@index');
    Route::get('/add-book', 'BookController@create');
    Route::post('/do-add-book', 'BookController@store');
    Route::get('/edit-book/{id}', 'BookController@show');
    Route::post('/do-update-book/{id}', 'BookController@update');
    Route::get('/delete-book/{id}', 'BookController@destroy');

    // Point Setting
    Route::get('/point-setting', 'PointSettingController@index');
    Route::post('/update-point-setting', 'PointSettingController@updateSetting');
    Route::post('/save-setting-redeem', 'PointSettingController@saveSettingRedeem');

    // Challenge
    Route::get('/challenge', 'ChallengeController@index');
    Route::get('/add-challenge', 'ChallengeController@create');
    Route::post('/do-add-challenge', 'ChallengeController@store');
    Route::get('/edit-challenge/{id}', 'ChallengeController@show');
    Route::post('/do-update-challenge/{id}', 'ChallengeController@update');
    Route::get('/delete-challenge/{id}', 'ChallengeController@destroy');

    // Items
    Route::get('/item', 'ItemController@index');
    Route::get('/add-item', 'ItemController@create');
    Route::post('/do-add-item', 'ItemController@store');
    Route::get('/edit-item/{id}', 'ItemController@show');
    Route::post('/do-update-item/{id}', 'ItemController@update');
    Route::get('/delete-item/{id}', 'ItemController@destroy');
    Route::get('/item-transaction', 'ItemController@itemTransaction');
    Route::post('/item-transaction-update/{id}', 'ItemController@updateItemTransaction');

    // Shop
    Route::get('/shop', 'ShopController@index');
    Route::post('/buy-item/{item_id}', 'ShopController@buyItem');
    Route::get('/shop-history', 'ShopController@shopHistory');
    

    // Review
    Route::get('/review', 'ReviewController@index');
    Route::post('/do-update-review/{id}', 'ReviewController@update');
    Route::get('/delete-review/{id}', 'ReviewController@destroy');

    // Rewards
    Route::get('/rewards', 'RewardController@index');
    Route::get('/rewards-list', 'RewardController@index_user');
    Route::get('/add-rewards', 'RewardController@create');
    Route::post('/do-add-rewards', 'RewardController@store');
    Route::get('/edit-rewards/{id}', 'RewardController@show');
    Route::post('/do-update-rewards/{id}', 'RewardController@update');
    Route::get('/delete-rewards/{id}', 'RewardController@destroy');
    Route::post('/redeem-rewards', 'RewardController@redeemReward');
    Route::get('/get-detail-reward/{id}', 'RewardController@getDetailReward');
    
    Route::get('/redeem', 'RewardController@listRedeemRequest');
    Route::post('/change-status', 'RewardController@changeStatusReward');


    /*
    * ====================================
    * USERS SESSION
    * ====================================
    */

    Route::get('/list-book', 'BookController@listBook');
    Route::get('/book-detail/{id}', 'BookController@detailBook');
    Route::post('/review-book/{id}', 'ReviewController@doReviewBook');
    Route::get('/read-book/{id}', 'BookController@readBook');
    Route::get('/earn-point-read/{id}', 'BookController@earnPointRead');
    Route::get('/redeem-point-to-key', 'PointSettingController@redeemPointToKey');
    Route::get('/unlock-book/{book_id}', 'BookController@unlockBook');
    Route::post('/claim-reward', 'RewardController@claimReward');
});

Route::get('/reset-leaderboard-cron', 'UserController@resetLeaderboard');
