<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function(){

	Route::get('/', function () {

	    return view('welcome');
	});

	Route::auth();

	Route::get('/home', 'HomeController@index');

	//讀取即時資料
	Route::get('/data/machines/{machine_index}/immediate', 'DataController@monitor');
	Route::get('/data/machines/{machine_index}/immediate/ajax','DataController@ajax_monitor');

	//讀取加工資料
	Route::get('/data/machines/{machine_index}/machineData', 'DataController@data_uilization');

	// 資料庫資料
	Route::get('/data/status', 'DataController@status');
	// 模擬在地端程式自動傳輸資料
	Route::get('/data/machines/{machine_index}/test','DataController@test_monitor');
	Route::get('/data/machines/{machine_index}/test/ajax','DataController@ajax_test_monitor');

	//目前關掉token及會員認證
	Route::post('/data/machines/{machine_index}','StoreDataController@storeData_Position');

	//測試傳輸資料的表單 post 傳輸
	Route::get('/data/machines/{machine_index}/test/storeData','DataController@test_storeData_Position');

	//到時候修改到這裡存取 (有經過會員認證)
	Route::get('/data/machines/{machine_index}/GET','StoreDataController@storeData_Position');
	//取得Token (備用)
	Route::get('/data/test/token','StoreDataController@getToken');
});