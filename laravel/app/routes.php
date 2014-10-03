<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('uploadform');
});

Route::post('/', 'UploadController@Process');
Route::get('/file/{filename}', 'UploadController@ShowFile');
Route::get('/getfile/{filename}', 'UploadController@RawFile');
Route::post('/apiupload', 'UploadController@ApiUpload');

Route::get('/admin', 'AdminController@ShowFiles');