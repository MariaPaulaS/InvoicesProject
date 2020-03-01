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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("/clients", 'ClientsController');

Route::resource("/companies", 'CompaniesController');

Route::resource("/invoices", "InvoicesController");

Route::resource("/products", 'ProductsController');

Route::get('/invoices/{id}/invoice_product/create', 'InvoicesController@createInvoiceProduct');

Route::post('/invoices/{id}/invoice_product', 'InvoicesController@invoiceProductStore');

Route::get('invoices/show/{id}', 'InvoicesController@show');

Route::get('/invoices/import/view', 'InvoicesController@importView')->name('invoices.import.view');

Route::post('/invoices/import', 'InvoicesController@importExcel')->name('invoices.import');
