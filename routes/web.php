<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('ajax-crud', 'AjaxCrudController');
Route::post('ajax-crud/update', 'AjaxCrudController@update')->name(
    'ajax-crud.update');
Route::get('ajax-crud/destroy/{id}','AjaxCrudController@destroy');
Route::get('dynamic-field','DynamicFieldcontroller@index');
Route::get('dynamic-field/insert','DynamicFieldConroller@insert')->name('dynamic-field.insert');

Route::get('file-import-export', 'UserController@fileImportExport');
Route::post('file-import', 'UserController@fileImport')->name('file-import');
Route::get('file-export', 'UserController@fileExport')->name('file-export');
Route::get('/create-table', 'TableController@operate');
Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');

Route::get('/', function () {
    return view('dynamic_field'); 
});
Route::get('ajax',function() {
    return view('message');
 });
 Route::post('/getmsg','AjaxController@index');
