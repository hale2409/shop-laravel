<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/login', 'Admin\AdminController@getLogin')->name('login');
Route::post('admin/login', 'Admin\AdminController@postLogin');
Route::get('admin/logout', 'Admin\AdminController@getLogout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'auth'], function (){
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::prefix('categories')->group(function () {
        Route::get('/', 'AdminCategoryController@index')->name('categories.index');
        Route::get('/create', 'AdminCategoryController@create')->name('categories.create');
        Route::post('/store', 'AdminCategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'AdminCategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'AdminCategoryController@delete')->name('categories.delete');
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', 'AdminMenuController@index')->name('menus.index');
        Route::get('/create', 'AdminMenuController@create')->name('menus.create');
        Route::post('/store', 'AdminMenuController@store')->name('menus.store');
        Route::get('/edit/{id}', 'AdminMenuController@edit')->name('menus.edit');
        Route::post('/update/{id}', 'AdminMenuController@update')->name('menus.update');
        Route::get('/delete/{id}', 'AdminMenuController@delete')->name('menus.delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', 'AdminProductController@index')->name('product.index');
        Route::get('/create', 'AdminProductController@create')->name('product.create');
        Route::post('/store', 'AdminProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('product.edit');
        Route::post('/update/{id}', 'AdminProductController@update')->name('product.update');
        Route::get('/delete/{id}', 'AdminProductController@delete')->name('product.delete');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', 'AdminSliderController@index')->name('slider.index');
        Route::get('/create', 'AdminSliderController@create')->name('slider.create');
        Route::post('/store', 'AdminSliderController@store')->name('slider.store');
        Route::get('/edit/{id}', 'AdminSliderController@edit')->name('slider.edit');
        Route::post('/update/{id}', 'AdminSliderController@update')->name('slider.update');
        Route::get('/delete/{id}', 'AdminSliderController@delete')->name('slider.delete');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', 'AdminSliderController@index')->name('setting.index');
        Route::get('/create', 'AdminSliderController@create')->name('setting.create');
        Route::post('/store', 'AdminSliderController@store')->name('setting.store');
        Route::get('/edit/{id}', 'AdminSliderController@edit')->name('setting.edit');
        Route::post('/update/{id}', 'AdminSliderController@update')->name('setting.update');
        Route::get('/delete/{id}', 'AdminSliderController@delete')->name('setting.delete');
    });
});

