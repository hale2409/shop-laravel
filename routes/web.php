<?php

use Illuminate\Support\Facades\Route;


//Route::get('admin/login', 'Admin\AdminController@loginAdmin')->name('admin.login');
//Route::post('admin/login', 'Admin\AdminController@postLoginAdmin');
//Route::get('admin/logout', 'Admin\AdminController@logoutAdmin')->name('admin.logout');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function (){
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
});

