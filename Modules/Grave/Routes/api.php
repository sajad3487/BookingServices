<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/grave', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api'],function(){
   Route::resource('grave','GraveController')->except('create','edit');
   Route::get('grave/{userId}/user','graveController@gravesOfUser');
});
