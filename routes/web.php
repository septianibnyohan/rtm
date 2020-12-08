<?php

use Illuminate\Support\Facades\Route;
use App\Models\Suhu;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/in', 'InController@index')->name('in');
Route::get('/listIn', 'InController@listIn')->name('listIn');
Route::get('/out', 'OutController@index')->name('out');
Route::get('/listOut', 'OutController@listOut')->name('listOut');
Route::get('/setting', 'SettingsController@index')->name('settings');
Route::post('/setting', 'SettingsController@save')->name('saveSetting');
Route::get('/suhu', 'SuhuController@index')->name('suhu');
Route::get('/listSuhu', 'SuhuController@listSuhu')->name('listSuhu');
Route::get('/summary', 'SummaryController@index')->name('summary');
Route::get('/listSummary', 'SummaryController@listSummary')->name('listSummary');
Route::get('/excel_suhu', 'SuhuController@export_excel')->name('excel_suhu');
Route::get('/excel_summary', 'SummaryController@export_excel')->name('excel_summary');
Route::get('/excel_in', 'InController@export_excel')->name('excel_in');
Route::get('/excel_out', 'OutController@export_excel')->name('excel_out');

Route::get('/cal_load', 'CalendarController@load')->name('cal_load');
Route::post('/cal_insert', 'CalendarController@insert')->name('cal_insert');
Route::post('/cal_getevent', 'CalendarController@getevent')->name('cal_getevent');
Route::post('/cal_update', 'CalendarController@update')->name('cal_update');
Route::post('/cal_delete', 'CalendarController@delete')->name('cal_delete');

Route::get('/test_index', 'TestController@index')->name('test_index');
Route::get('/test_getsuhu', 'TestController@getsuhu')->name('test_getsuhu');

//display todo list
Route::get('list-user','DataTableUserCrudController@index');
//display add todo form and create a new todo
Route::get('add-user','DataTableUserCrudController@create');
Route::post('post-user','DataTableUserCrudController@store');
//display add todo form and create a new todo
Route::get('edit-user/{id?}','DataTableUserCrudController@edit');
Route::post('update-user','DataTableUserCrudController@update');
//display add todo form and create a new todo
Route::get('delete-user/{id?}','DataTableUserCrudController@delete');