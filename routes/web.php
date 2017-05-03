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

//Route::get('/', function () {
//		$a=DB::table('user')->get();
//    return view('welcome');
//});

Route::get('/', 'VodController@index');
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'VodController@index');
    Route::get('/video/{video?}', 'VodController@video');
});
Route::group([
    'middleware' => ['web', 'role:admin'],
    'namespace'=>'Admin',
    'prefix'=>'admin'
], function () {
    Route::get('/', 'AdminController@index')->name('admin::index');
});
Route::group([
    'middleware' => ['web', 'role:admin'],
    'namespace'=>'Admin'
], function () {
    Route::resource('videos','VideoController');
});
