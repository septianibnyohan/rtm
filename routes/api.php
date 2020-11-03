<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/insertSuhu', 'ApiController@insertSuhu')->name('insertSuhu');
Route::post('/insertIn', 'ApiController@insertIn')->name('insertIn');
Route::post('/insertOut', 'ApiController@insertOut')->name('insertOut');
Route::get('/checkEvent', 'ApiController@checkEvent')->name('checkEvent');
Route::get('/listSuhu', 'ApiController@listSuhu')->name('listSuhu');
Route::get('/listIn', 'ApiController@listIn')->name('listIn');
Route::get('/listOut', 'ApiController@listOut')->name('listOut');
Route::get('/getLastSuhu', 'ApiController@getLastSuhu')->name('lastSuhu');
Route::get('/getLastIn', 'ApiController@getLastIn')->name('lastIn');
Route::get('/getLastOut', 'ApiController@getLastOut')->name('lastOut');
Route::get('/getLastSummary', 'ApiController@getLastSummary')->name('lastOut');

Route::get('/articles', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return "article";
});