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

Route::get('/', 'HomeController@HomeIndex');

Route::get('/visitor', 'VisitorController@VisitorIndex');

Route::get('/services', 'ServicesController@ServicesIndex');

Route::get('/getServicesData', 'ServicesController@getServiceData');

Route::post('/ServiceDelete', 'ServicesController@ServiceDelete');

Route::post('/ServiceEdit', 'ServicesController@ServiceEdit');

Route::post('/getServicesSingleData', 'ServicesController@getServicesSingleData');

Route::post('/ServiceAdd', 'ServicesController@ServiceAdd');