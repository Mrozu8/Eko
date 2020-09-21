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
    return redirect()->route('login');
});

Auth::routes();


//================ admin ===============

Route::get('/admin-dashboard', 'AdminController@dashboard')->name('admin-dashboard'); // First page admin account
Route::get('/admin-user/new', 'AdminController@user_new')->name('user-new'); // Crete user page
Route::post('/admin-user/create', 'AdminController@user_create')->name('user-create'); // Crete new user
Route::get('/admin-user/list', 'AdminController@user_list')->name('user-list'); // User list
Route::get('/admin-user/{id}/edit', 'AdminController@user_edit')->name('user-edit'); // User edit page
Route::post('/admin-user/{id}/update', 'AdminController@user_update')->name('user-update'); // User update data
Route::delete('/admin-user/{id}/delete', 'AdminController@user_delete')->name('user-delete'); // User delete

Route::get('/admin-invoice', 'AdminController@invoice_data')->name('admin-invoice'); // Invoice settings
Route::post('/admin-invoice/edit', 'AdminController@invoice_edit')->name('invoice-edit'); // Invoice edit


Route::get('/not-access', 'HomeController@access_page')->name('access_page'); // access page


//===================== Accountant =============

Route::get('/accountant-dashboard', 'HomeController@accountant_dashboard')->name('accountant-dashboard'); // First page accountant account
Route::get('/worker-dashboard', 'HomeController@worker_dashboard')->name('worker-dashboard'); // First page worker account
Route::get('/technician-dashboard', 'HomeController@technician_dashboard')->name('technician-dashboard'); // First page technician account


//=================== Sale ====================


Route::get('/sale/new-sale', 'SalesController@new_sale')->name('seal-new-item'); // page to create sale item
Route::post('/sale/new-sale/store', 'SalesController@sale_store')->name('seal-store'); // page to create sale item

Route::post('/sale/new-sale/item-exists', 'SalesController@item_exists')->name('item-exists'); // Warehouse item exists


// ================== Buy =======================

Route::get('/buy/new', 'BuysController@new')->name('buy-new'); // get to page with new order buy
Route::post('/buy/new/store', 'BuysController@store')->name('buy-store'); // store new buy


//============== Warehouse =================

Route::get('/warehouse', 'WarehouseController@list')->name('warehouse-list'); // first page warehouse
Route::get('/warehouse/{code}/single', 'WarehouseController@single')->name('warehouse-single'); // single page warehouse item
Route::delete('/warehouse/{id}/single/delete', 'WarehouseController@delete')->name('warehouse-delete'); // delete single warehouse item
Route::post('/warehouse/{id}/single/transfer', 'WarehouseController@transfer')->name('warehouse-transfer'); // transfer single warehouse item
Route::get('/warehouse/search', 'WarehouseController@search')->name('warehouse-search');
Route::post('/warehouse/{code}/single/book', 'WarehouseController@book')->name('warehouse-book'); // book product
Route::delete('/warehouse/single/book/{id}', 'WarehouseController@book_delete')->name('warehouse-book-delete'); // book product delete

// =============== Order ================

Route::get('/order/new', 'OrdersController@new')->name('order-new'); // create new order
Route::post('/order/new/store', 'OrdersController@store')->name('order-store'); // store new order
Route::get('/order/list', 'OrdersController@list')->name('order-list'); // order list
Route::get('/order/{id}/single', 'OrdersController@single')->name('order-single'); // order single page
Route::post('/order/{id}/change-status', 'OrdersController@change_status')->name('change-status');


//============= Repair =====================

Route::get('/repair/new', 'RepairsController@new')->name('repair-new'); // create new repair order page
Route::post('/repair/new/create', 'RepairsController@create')->name('repair-create'); // create new repair order function
Route::get('/repair/current', 'RepairsController@current')->name('repair-current'); // current repair page
Route::get('/repair/current/{id}', 'RepairsController@single')->name('repair-single'); // current repair page single
Route::post('/repair/current/{id}/end', 'RepairsController@end')->name('repair-end'); // end repair
Route::post('/repair/current/{id}/add-worker', 'RepairsController@add_worker')->name('repair-add-worker'); // add worker to repair
Route::get('/repair/ended', 'RepairsController@ended')->name('repair-ended'); // ended repair page

Route::post('/repair/new/date-check', 'RepairsController@date_check')->name('repair-date-check'); // checked date repair AJAX


// ======== Calendar ====================

Route::get('/calendar', 'CalendarController@index')->name('calendar'); // first page calendar
Route::post('/calendar/add-slot', 'CalendarController@add_slot')->name('add-slot'); // add slot to calendar
Route::post('/calendar/edit-slot', 'CalendarController@edit_slot')->name('edit-slot'); // edit slot in calendar


//=============== Archives ===================

Route::get('/archives/sale', 'ArchivesController@sale_list')->name('sale-list'); // Archive sale items
Route::get('/archives/buy', 'ArchivesController@buy_list')->name('buy-list'); // Archive buy items
Route::get('/archives/repair', 'ArchivesController@repair_list')->name('repair-list'); // Archive repair items


//================ PDF ==================

Route::get('/archives/sale/{id}', 'ArchivesController@sale_pdf')->name('sale-pdf'); // Archive sale PDF
Route::get('/archives/buy/{id}', 'ArchivesController@buy_pdf')->name('buy-pdf'); // Archive buy PDF
Route::get('/archives/repair/{id}', 'ArchivesController@repair_pdf')->name('repair-pdf'); // Archive repair PDF

