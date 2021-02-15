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

// Route::get('/dashboard', function () {
//     return view('index');
// });

Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::post('/','Auth\LoginController@login')->name('login');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::group(['middleware' => 'auth'], function () { // middleware adalah kek satpam sebelom masuk di periksa dlu
    

    Route::get('dashboard','DashboardController@index');
    Route::resource('customer', 'CustomerController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('unit',     'UnitController');
    Route::resource('category',   'CategoryController');
    Route::resource('item','ItemController');
    Route::get('item/qrcode/{id}','ItemController@generate')->name('item.generate');
    Route::resource('sale','SaleController');
    // Route::post('sale/cart','SaleController@cart');
    Route::resource('stock/in', 'StockInController');
    Route::resource('stock/out', 'StockOutController');
    Route::post('sale/cart','SaleController@storecart');
    Route::post('sale/delete','SaleController@cart_del');
    Route::post('sale/post','SaleController@storesale');
    Route::post('sale/postdetail','SaleController@store_sale_detail');
    Route::put('sale/updatecart/{id}','SaleController@updatecart');
    Route::get('sale/cart/data','SaleController@cart');
    Route::get('report/print','ReportController@index')->name('report.index');
    Route::get('report/print/{id}','ReportController@cetak_invoice')->name('cetakinv');
    // Route::get('report/printqr/{id}','ReportController@print_qrcode')->name('report.qrcode');
    // Route::get('/{id}/print', 'SaleController@generateInvoice')->name('invoice.print');
        
   
    Route::delete('deleteall/customer', 'CustomerController@deleteAll');
    Route::delete('deleteall/supplier', 'SupplierController@deleteAll');
    Route::delete('deleteall/unit', 'UnitController@deleteAll');
    Route::delete('deleteall/category', 'categoryController@deleteAll');
    Route::delete('deleteall/item', 'ItemController@deleteAll');
    Route::get('logout','Authentikasi\OtetikansiController@logout')->name('logout');
});





Route::get('/home', 'HomeController@index')->name('home');
