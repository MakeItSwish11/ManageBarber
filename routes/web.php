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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/customer/form', 'CustomerController@index')->name('showCustomerForm');
    Route::get('/customer', 'CustomerController@view')->name('showCustomer');
    Route::get('/customer/list', 'CustomerController@listView')->name('showListCustomer');

    Route::post('/customer/edit', 'CustomerController@edit')->name('editCustomer');
    Route::post('/customer/form', 'CustomerController@store')->name('saveCustomer');

    Route::get('/barber', 'BarberController@view')->name('showBarber');
    Route::get('/barber/list', 'BarberController@listView')->name('showListBarber');
    Route::post('/barber/edit', 'BarberController@edit')->name('editBarber');

    Route::get('/barber/form', 'BarberController@index')->name('showBarberForm');
    Route::post('/barber/form', 'BarberController@store')->name('saveBarber');

    Route::get('/facility', 'FacilityController@view')->name('showFacility');
    Route::get('/facility/list', 'FacilityController@listView')->name('showListFacility');
    Route::get('/facility/form', 'FacilityController@index')->name('showFacilityForm');
    Route::post('/facility/form', 'FacilityController@store')->name('saveFacility');

    Route::post('/facility/{id}/delete', 'FacilityController@remove')->name('deleteFacility');
    Route::post('/barber/{id}/delete', 'BarberController@remove')->name('deleteBarber');
    Route::post('/customer/{id}/delete', 'CustomerController@remove')->name('deleteCustomer');
});