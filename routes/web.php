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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@home')->name("admin.dashboard");
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::resource('products', 'ProductsController', ['as' => 'admin']);
    
    Route::get('orders/selling', 'OrdersController@selling')->name('admin.orders.selling');
    Route::get('orders/purchasing', 'OrdersController@purchasing')->name('admin.orders.purchasing');
    Route::resource('orders', 'OrdersController', ['as' => 'admin', 'except' => 'index']);
    
    
    Route::resource('agents', 'AgentsController', ['as' => 'admin']);
    Route::resource('customers', 'CustomersController', ['as' => 'admin']);
    Route::resource('options', 'OptionsController', ['as' => 'admin']);
    Route::resource('categories', 'CategoriesController', ['as' => 'admin']);
    Route::get('/flash', function() {
      flash()->overlay('User added successfully !', 'Success', 'success');
    return view("admin.dashboard");
  });
});

Route::group(['middleware' => 'guest'], function() {
   	//LOGIN URL
   	Route::get('/', 'HomeController@index')->name("login");
   	Route::post('/login', 'HomeController@login');
   	Route::get('/logout', 'HomeController@logout')->name("logout");
});

Route::get('/flash', function() {
    flash()->overlay('User added successfully !', 'Success', 'success');
	return view("welcome");
});