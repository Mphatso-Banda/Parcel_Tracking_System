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

Route::get('/', 'App\Http\Controllers\ParceltrackcusController@index');


Route::get('Customer/index', function () {
    return view('Customer/index');
});

    
    // this is the Admin routes Group
Route::group(['prefix' => '/Admin', 'middleware' => ['auth']], function(){

    Route::get('index', 'App\Http\Controllers\DashboardController@count');
    

    Route::get('branch','App\Http\Controllers\BranchController@index');

    Route::get('add_branch','App\Http\Controllers\BranchController@create');

    Route::post('store_branch','App\Http\Controllers\BranchController@store');

    Route::get('edit_branch/{id}','App\Http\Controllers\BranchController@edit');

    Route::post('update-branch/{id}','App\Http\Controllers\BranchController@update');

    Route::get('delete_branch/{id}','App\Http\Controllers\BranchController@destroy');


    Route::get('store_parcel','App\Http\Controllers\ParcelController@store');

    Route::get('edit_parcel/{id}','App\Http\Controllers\ParcelController@edit');

    Route::post('update_parcel/{id}','App\Http\Controllers\ParcelController@update');

    Route::get('delete_parcel/{id}','App\Http\Controllers\ParcelController@destroy');

    Route::get('parcel_list', 'App\Http\Controllers\ParcelController@index');

    Route::get('new_parcel', 'App\Http\Controllers\ParcelController@create');

    Route::post('store_parcel', 'App\Http\Controllers\ParcelController@store');

    Route::post('update_status', 'App\Http\Controllers\ParceltrackController@store');



    Route::post('track_parcel', 'App\Http\Controllers\ParceltrackController@track');

    Route::get('track', 'App\Http\Controllers\ParceltrackController@index');

    Route::get('staff_list', 'App\Http\Controllers\UserController@index');

    Route::get('new_staff', 'App\Http\Controllers\UserController@create');

    Route::get('delete_staff/{id}', 'App\Http\Controllers\UserController@destroy');

    

    
    Route::get('reports', 'App\Http\Controllers\ReportController@index');

    Route::post('create_report', 'App\Http\Controllers\ReportController@create');


});

Route::group(['prefix' => '/Customer'], function(){
    Route::post('track_parcel', 'App\Http\Controllers\ParceltrackcusController@track');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
