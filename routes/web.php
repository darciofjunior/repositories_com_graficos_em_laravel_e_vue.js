<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('reports/vue', 'ReportsController@vue')->name('reports.vue');
    
    //Reports ...
    Route::get('reports/months', function() {
        return view('admin.charts.months');
    });

    Route::get('reports/years', function() {
        return view('admin.charts.years');
    });
    
    Route::any('produts/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');
 
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    Route::get('/', 'DashBoardController@index')->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', 'SiteController@index');