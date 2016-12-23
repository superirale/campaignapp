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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('lists', 'ListController');
Route::resource('brands', 'BrandsController');
Route::resource('smtp_settings', 'SmtpSettingsController');
Route::resource('api_settings', 'ApiSettingsController');
Route::resource('clients', 'ClientsController');
Route::resource('campaign-fees', 'CampaignFeesController');