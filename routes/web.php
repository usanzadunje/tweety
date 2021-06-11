<?php

use App\Tweet;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/test', function (Request $request) {
    $request->session()->flash('key', 'Helloo from flash session message');
    return $request->session()->all();
});

Route::get('/test1', function (Request $request) {
    return $request->session()->all();
});


Route::middleware('auth')->group(function () {

    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');
    Route::delete('/tweets/{tweet}', 'TweetController@destroy');

    Route::post('/tweets/{tweet}/like', 'TweetLikeController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikeController@destroy');

    Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile');
    Route::post('/profiles/{user:username}/follow', 'FollowController@store')->name('profiles.store');

    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit')
        ->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfileController@update')
        ->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController');

    Route::get('/notifications', 'NotificationController@index');

});


Auth::routes();