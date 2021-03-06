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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@Postlogin');
Route::post('get/phone', 'API\UserController@getPhone');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    
    
    
    Route::post('pass', 'API\UserController@setPass');
});
Route::post('/download/history/show', 'API\DownloadController@showHistory');
Route::get('/content/show/all', 'API\ContentController@show');

Route::post('/content/show/page', 'API\ContentController@showContent');

Route::post('/content/search', 'API\ContentController@searchContent');

Route::post('/content/show/cat', 'API\ContentController@showCatContent');

Route::post('/content/show/filter', 'API\ContentController@filter');

Route::post('/content/add/star', 'API\ContentController@addStar');

Route::post('/content/remove/star', 'API\ContentController@removeStar');

Route::post('/publisher/show/contents', 'API\PublisherController@contentList');



Route::post('get/version', 'API\DeviceController@getVersion');

Route::post('payment', function(Request $request){
//    return redirect(url('/aa'));
    
    
        return response()->json(redirect(url('/aa'))); 
});


Route::get('download/image/{publisher_id}/{content_id}/{filename}', 'API\DownloadController@imageDownload')
->where('filename', '[A-Za-z0-9\-\_\.]+');
Route::get('download/media/{publisher_id}/{content_id}/media/{filename}', 'API\DownloadController@mediaDownload')
->where('filename', '[A-Za-z0-9\-\_\.]+');


Route::post('/update/kadouk', 'API\AppController@checkVersion');


Route::get('download/file/{dev}/{pkg}', 'API\DownloadController@fileDownload');