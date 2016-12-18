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
Route::get('importData','ExcelController@importData');
Route::get('download','ExcelController@download');
Route::post('importArticle','ExcelController@importArticle');
Route::post('importSlip','ExcelController@importSlip');
Route::post('importCharacter','ExcelController@importCharacter');
Route::post('importSlipContent','ExcelController@importSlipContent');
Route::post('Binding','ExcelController@relationship');

Route::group(['prefix'=>'frontend','namespace'=>'Front','as'=>'frontend.'],function(){


    Route::resource('article', 'ArticleController');
    Route::resource('slip', 'SlipController');


});
