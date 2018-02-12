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
    return view('Pages.dashboard');
});

Route::resource('/products', 'ProductController');
Route::resource('/invoice', 'InvoiceController');
Route::resource('/customer', 'CustomerController');

Route::get('dropzone', 'ImageController@dropzone');
Route::post('/images/update/{id}', 'ImageController@imageUpdate');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'ImageController@dropzoneStore']);

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/product-invoice', 'ProductController@productsForInvoice');
Route::get('/Product/modal/{id}', 'ProductController@productForInvoiceModal');
Route::get('/invoice/pdf/{id}', 'PDFController@InvoicePDF');
