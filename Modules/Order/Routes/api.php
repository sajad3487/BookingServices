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
Route::group(['middleware'=>'auth:api'],function (){
//   Route::resource('order','OrderController')->except('create','edit');
   Route::get('order/{orderId}','OrderController@show')->name('order.show');
   Route::post('order','OrderController@store')->name('order.create');
   Route::patch('order/{orderId}','OrderController@update')->name('order.update');
   Route::delete('order/{orderId}','OrderController@destroy')->name('order.delete');
   Route::get('order/','OrderController@ordersOfUser')->name('order.orderOfUser');;
   Route::get('reorder/{orderId}','OrderController@reorder')->name('reorder');;
});
