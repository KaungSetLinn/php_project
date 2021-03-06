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

Route::get('user_register', function() {
    return view('registration_page');
});

Route::post('user_register', 'UserController@store');

Route::get('image', function() {
    return view('image_test');
});

Route::post('image', 'ImageController@store')->name('img_insert');

Route::get('image_display', 'ImageController@display');

Route::get('user_login', function() {
    return view('create_login');
});

Route::post('user_login', 'UserController@authenticate');

Route::get('jquery', function() {
    return view('jquery_test');
});

Route::get('/home_page', 'MainController@index')->name('home_page');
Route::get('/shop/{id?}', 'MainController@show_shop_page')->name('shop');
Route::get('/cart', 'MainController@show_cart_page')->name('cart');

Route::post('loadmoredata','jobsController@loadmoredata');
Route::post('/order', 'OrderController@store')->name('order');
Route::get('/profile', 'MainController@show_profile')->name('profile');
Route::post('/profile/edit_password', 'ProfileController@update_password')->name('password_update');
Route::post('/profile/edit_profile', 'ProfileController@update_profile')->name('profile_update');
Route::post('/profile/edit_measurement', 'ProfileController@update_measurement')->name('measurement_update');
Route::get('/measurement', 'MainController@view_how_to_measure')->name('measurement');

//Admin routes
Route::get('admin/tailors','UserController@tailor_list');
Route::get('admin/customers', 'UserController@customer_list');
Route::get('admin/dress', 'DressController@get_dress_type')->name('admin_dress_add');
Route::post('admin/dress', 'DressController@store')->name('admin_dress_add');
Route::get('admin/dress/newtrending', 'DressController@display_trending_dress_add_form')->name('admin_trending_dress_add');
Route::post('admin/dress/newtrending', 'DressController@handle_trending_dress_add_form')->name('admin_trending_dress_add');
Route::get('admin/dress/trending', 'DressController@display_trending_dress_view')->name('admin_trending_dress');



Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);

Route::get('tailor/home', 'HomeController@tailorHome')->name('tailor.home')->middleware('is_tailor');