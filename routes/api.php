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

Route::prefix('v1')->group(function () {
	//vendor
		//create vendor
		route::post('vendor/create','VendorController@store');
		//update vendor
		route::put('vendor/{id}/update','VendorController@update');
		//get all vendor
		route::get('vendor','VendorController@index');
		//delete vendor
		route::delete('vendor/{id}/delete','VendorController@destroy');
		//get dish by vendor id
		route::get('vendor/{id}/dish','VendorController@dish');
		//get vendor by id
		route::get('vendor/{id}/show','VendorController@show');


	//dish
		//create
		route::post('dish/create','DishController@store');
		//get all dish
		route::get('dish','DishController@index');
		//update dish
		route::put('dish/{id}/update','DishController@update');
		//delete dish
		route::delete('dish/{id}/delete','DishController@destroy');
		//get order by dish id
		route::get('dish/{id}/order','DishController@order');
		//get dish by id
		route::get('dish/{id}/show','DishController@show');

	//order
		//create
		route::post('order/create','OrderController@store');
		//get all order
		route::get('order','OrderController@index');
		//update order
		route::put('order/{id}/update','OrderController@update');
		//delete order
		route::delete('order/{id}/delete','OrderController@destroy');
		//get order by id
		route::get('order/{id}/show','DishController@show');


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


