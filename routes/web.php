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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
  //Category
  Route::get('/categories', 'CategoryController@index')->name('categories');
  Route::get('/createcategory', 'CategoryController@create')->name('createcategory');
  Route::post('/createcategory', 'CategoryController@store')->name('createcategory');
  Route::get('/editcategory/{id}', 'CategoryController@edit')->name('editcategory');
  Route::post('/editcategory/{id}', 'CategoryController@update')->name('editcategory');
  Route::delete('/deletecategory/{id}', 'CategoryController@destroy')->name('deletecategory');
  //Category
  Route::get('/brands', 'BrandController@index')->name('brands');
  Route::get('/createbrand', 'BrandController@create')->name('createbrand');
  Route::post('/createbrand', 'BrandController@store')->name('createbrand');
  Route::get('/editbrand/{id}', 'BrandController@edit')->name('editbrand');
  Route::post('/editbrand/{id}', 'BrandController@update')->name('editbrand');
  Route::delete('/deletebrand/{id}', 'BrandController@destroy')->name('deletebrand');
  //Products
  Route::get('/products', 'ProductController@index')->name('products');
  Route::get('/createproduct', 'ProductController@create')->name('createproduct');
  Route::post('/createproduct', 'ProductController@store')->name('createproduct');
  Route::get('/editproduct/{id}', 'ProductController@edit')->name('editproduct');
  Route::post('/editproduct/{id}', 'ProductController@update')->name('editproduct');
  Route::delete('/deleteproduct/{id}', 'ProductController@destroy')->name('deleteproduct');
  // Sales Manager
  Route::get('/salesmanagers', 'SalesManagerController@index')->name('salesmanagers');
  Route::get('/createsalesmanager', 'SalesManagerController@create')->name('createsalesmanager');
  Route::post('/createsalesmanager', 'SalesManagerController@store')->name('createsalesmanager');
  Route::get('/editsalesmanager/{id}', 'SalesManagerController@edit')->name('editsalesmanager');
  Route::post('/editsalesmanager/{id}', 'SalesManagerController@update')->name('editsalesmanager');
  Route::delete('/deletesalesmanager/{id}', 'SalesManagerController@destroy')->name('deletesalesmanager');
  // Clients
  Route::get('/clients','ClientController@index')->name('clients');
  Route::get('/createclient','ClientController@create')->name('createclient');
  Route::post('/createclient','ClientController@store')->name('createclient');
  Route::get('/editclient/{id}', 'ClientController@edit')->name('editclient');
  Route::post('/editclient/{id}', 'ClientController@update')->name('editclient');
  Route::delete('/deleteclient/{id}', 'ClientController@destroy')->name('deleteclient');
  //Operator
  Route::get('/operators', 'OperatorController@index')->name('operators');
  Route::get('/createoperator', 'OperatorController@create')->name('createoperator');
  Route::post('/createoperator', 'OperatorController@store')->name('createoperator');
  Route::get('/editoperator/{id}', 'OperatorController@edit')->name('editoperator');
  Route::post('/editoperator/{id}', 'OperatorController@update')->name('editoperator');
  Route::delete('/deleteoperator/{id}', 'OperatorController@destroy')->name('deleteoperator');
  // Booking
  Route::get('/booking', 'BookingController@index')->name('booking');
  Route::get('/createbooking', 'BookingController@create')->name('createbooking');
  Route::post('/createbooking', 'BookingController@store')->name('createbooking');
  Route::get('/editbooking/{id}', 'BookingController@edit')->name('editbooking');
  Route::post('/editbooking/{id}', 'BookingController@update')->name('editbooking');
  Route::get('/deletebooking/{id}', 'BookingController@destroy')->name('deletebooking');
  //Change User password
  Route::get('/changepassword','SettingController@index')->name('changepassword');
  Route::post('/changepassword','SettingController@store')->name('changepassword');
});
