<?php

use Illuminate\Support\Facades\Route;

//front end route
Route::get('/', 'App\Http\Controllers\FrontEnd\MasterController@index');
Route::get('/Contact', 'App\Http\Controllers\FrontEnd\OthersController@contactpage');
Route::get('/All-Brands', 'App\Http\Controllers\FrontEnd\ProductsController@all_brands');
Route::get('/jobs_details/{id}', 'App\Http\Controllers\FrontEnd\ProductsController@job_details');


Route::get('/About', 'App\Http\Controllers\FrontEnd\OthersController@aboutpage');
Route::get('/All-Products', 'App\Http\Controllers\FrontEnd\ProductsController@all_products');

Route::get('/products/{id}/{name}', 'App\Http\Controllers\FrontEnd\ProductsController@products');
Route::get('/search/{mt}', 'App\Http\Controllers\FrontEnd\ProductsController@search');
Route::post('/search-data-all', 'App\Http\Controllers\FrontEnd\ProductsController@search_name');
Route::get('/product_details/{id}/{name}', 'App\Http\Controllers\FrontEnd\ProductsController@product_details');


Route::get('/all_author', 'App\Http\Controllers\FrontEnd\ProductsController@all_author');
Route::get('/all_publishers', 'App\Http\Controllers\FrontEnd\ProductsController@all_publishers');
Route::get('/all_subjects', 'App\Http\Controllers\FrontEnd\ProductsController@all_subjects');

// Route::get('/addcart/{id}', 'App\Http\Controllers\FrontEnd\ShoppingController@addcart');
Route::post('/addcart', 'App\Http\Controllers\FrontEnd\ShoppingController@addcart');

Route::get('/cartPage', 'App\Http\Controllers\FrontEnd\ShoppingController@cartPage');
Route::get('/get_division/{id}', 'App\Http\Controllers\FrontEnd\ShoppingController@get_division');
Route::get('/pToC', 'App\Http\Controllers\FrontEnd\ShoppingController@pToC');
Route::post('/make_payment', 'App\Http\Controllers\FrontEnd\ShoppingController@make_payment');
Route::post('/confirm_order', 'App\Http\Controllers\FrontEnd\ShoppingController@confirm_order');
Route::get('/confirmOrder', 'App\Http\Controllers\FrontEnd\ShoppingController@confirmOrder');
Route::get('/delete_product/{rowId}', 'App\Http\Controllers\FrontEnd\ShoppingController@delete_product');
Route::get('/delete_product/{rowId}', 'App\Http\Controllers\FrontEnd\ShoppingController@delete_product');





Route::get('/jai', 'App\Http\Controllers\FrontEnd\ShoppingController@jai');

Route::get('/sign-in', 'App\Http\Controllers\FrontEnd\CustomerController@signInForm');
Route::post('/save_information', 'App\Http\Controllers\FrontEnd\CustomerController@add_information');
Route::get('/myProfile/{id}', 'App\Http\Controllers\FrontEnd\CustomerController@myProfile');
Route::post('/track_order', 'App\Http\Controllers\FrontEnd\CustomerController@track_order');

Route::get('/log-out', 'App\Http\Controllers\FrontEnd\CustomerController@log_out');
Route::post('/check_customer', 'App\Http\Controllers\FrontEnd\CustomerController@check_customer');


Route::post('/check_customer', 'App\Http\Controllers\FrontEnd\CustomerController@check_customer');
Route::get('searchdata', 'App\Http\Controllers\FrontEnd\CustomerController@search_data_all')->name('searchdata');






//backend route-----------------------------

Route::get('/admin_login', 'App\Http\Controllers\BackEnd\LoginController@index');
Route::post('/data_ck', 'App\Http\Controllers\BackEnd\LoginController@data_ck');
Route::get('/log_out', 'App\Http\Controllers\BackEnd\LoginController@log_out');

Route::get('/Admin-Dashboard', 'App\Http\Controllers\BackEnd\MasterController@index');

Route::get('/category', 'App\Http\Controllers\BackEnd\CategoryController@category');
Route::post('/save_category_data', 'App\Http\Controllers\BackEnd\CategoryController@save_category_data');
Route::get('/dlt_cat/{id}', 'App\Http\Controllers\BackEnd\CategoryController@dlt_cat');

Route::get('/sub_category', 'App\Http\Controllers\BackEnd\CategoryController@sub_category');
Route::post('/save_sub_cat_data', 'App\Http\Controllers\BackEnd\CategoryController@save_sub_cat_data');
Route::get('/dlt_sub_cat/{id}', 'App\Http\Controllers\BackEnd\CategoryController@dlt_sub_cat');

Route::get('/jobs', 'App\Http\Controllers\BackEnd\BrandController@brand');
Route::post('/save_brand', 'App\Http\Controllers\BackEnd\BrandController@save_brand');
Route::get('/delete-brand/{id}', 'App\Http\Controllers\BackEnd\BrandController@delete_brand');

Route::get('/add_product', 'App\Http\Controllers\BackEnd\ProductsController@add_product');
Route::post('/save_product_data', 'App\Http\Controllers\BackEnd\ProductsController@save_product_data');
Route::get('/get_sub_cat/{category_id}', 'App\Http\Controllers\BackEnd\ProductsController@GetSubcat');
Route::get('/all_products', 'App\Http\Controllers\BackEnd\ProductsController@all_products');
Route::get('/delete_products/{id}', 'App\Http\Controllers\BackEnd\ProductsController@delete_products');

Route::get('/all_coupon', 'App\Http\Controllers\BackEnd\CouponController@all_coupon');
Route::post('/save_coupon', 'App\Http\Controllers\BackEnd\CouponController@save_coupon');

Route::get('/pending_order', 'App\Http\Controllers\BackEnd\OrdersController@pending_order');
Route::post('/accept_payment', 'App\Http\Controllers\BackEnd\OrdersController@accept_payment');
Route::get('/orderDetails/{id}', 'App\Http\Controllers\BackEnd\OrdersController@orderDetails');
Route::get('/confirm_order', 'App\Http\Controllers\BackEnd\OrdersController@confirm_order');
Route::get('/processing_order', 'App\Http\Controllers\BackEnd\OrdersController@processing_order');
Route::post('/progress_order', 'App\Http\Controllers\BackEnd\OrdersController@progress_order');
Route::get('/delivery_done', 'App\Http\Controllers\BackEnd\OrdersController@delivery_done');
Route::post('/done_delivery', 'App\Http\Controllers\BackEnd\OrdersController@done_delivery');
Route::get('/cancel_order', 'App\Http\Controllers\BackEnd\OrdersController@cancel_order');
Route::post('/order_cancel', 'App\Http\Controllers\BackEnd\OrdersController@order_cancel');

Route::get('/seo', 'App\Http\Controllers\BackEnd\SeoController@index');
Route::get('/site_setting', 'App\Http\Controllers\BackEnd\SettingController@site_setting');
Route::post('/save_site_setting_data', 'App\Http\Controllers\BackEnd\SettingController@save_site_setting_data');
Route::post('/save_slider', 'App\Http\Controllers\BackEnd\SettingController@save_slider');
Route::get('/delete-slider/{id}', 'App\Http\Controllers\BackEnd\SettingController@delete_slider');

Route::get('/stock_product_list', 'App\Http\Controllers\BackEnd\StockController@stock_product_list');
Route::get('/stockDetails/{id}', 'App\Http\Controllers\BackEnd\StockController@stockDetails');


Route::get('/blog', 'App\Http\Controllers\BackEnd\BlogController@index');
Route::post('/save_blog', 'App\Http\Controllers\BackEnd\BlogController@save_blog');

