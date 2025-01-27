<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/edit_profile', 'HomeController@edit_profile')->name('edit_profile');

Route::POST('/update_profile/{id}', 'HomeController@update_profile')->name('update_profile');

Route::get('/password_change/', 'HomeController@update_password')->name('update_password');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);


// Customer Route

Route::resource('customer', 'CustomerController');

Route::post('customer', [CustomerController::class, 'store_data'])->name('customer.store_data');


// Route::post('customer', 'CustomerController@store')->name('customer.store');



Route::resource('invoice', 'InvoiceController');

Route::get('/findPrice', 'InvoiceController@findPrice')->name('findPrice');

Route::get('/invoices/sales', 'InvoiceController@sales')->name('invoice.sales');

Route::get('/invoices/available_Product', 'InvoiceController@availableProduct')->name('invoice.available_Product');


Route::resource('category', 'CategoryController');

Route::get('changeStatus', 'CategoryController@changeStatus');

Route::resource('tax', 'TaxController');

Route::resource('product', 'ProductController');

Route::resource('supplier', 'SupplierController');

Route::resource('raw_material', 'RawMaterialController');

Route::get('changeStatus', 'RawMaterialController@changeStatus');




Route::resource('quotation', 'QuotationController');

Route::get('/findPrice', 'QuotationController@findPrice')->name('findPrice');

Route::get('/quotations/quotation_sales', 'QuotationController@quotation_sales')->name('quotation.quotation_sales');



// Payment Route

Route::get('/customer/payments/{customerId}', 'PaymentController@getCustomerPayments');

Route::get('/customer/payment/{id}', 'PaymentController@payment')->name('customer.payment');

Route::post('/customer/payment/', 'PaymentController@store')->name('customer.store');




?>

