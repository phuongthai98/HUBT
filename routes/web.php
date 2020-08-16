<?php

use Illuminate\Support\Facades\Route;

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
// Admin
Route::group(['prefix' => 'cms.admin','namespace' => 'admin', 'middleware' => 'web'], function () {
    Route::get('login', 'Admin@login')->name('login');
    Route::get('logout', 'Admin@logout')->name('logout');
    Route::post('post-login', 'Admin@post_login')->name('post-login');
    //Admin
    Route::get('/', 'Admin@index')->name('admin');
    //Group Categorys
    Route::resource('GroupCategory', 'GroupCategory');
    //Category
    Route::group(['prefix' => 'Category'], function () {
        Route::resource('Laptop', 'Category1');
        Route::resource('PhuKien', 'Category2');
        Route::resource('Ghe-Gaming', 'Category3');
        Route::resource('Ban-Gaming', 'Category4');
    });
    //Product
    Route::group(['perfix' => 'Product'], function () {
        Route::resource('Laptop', 'Product1');
        Route::resource('PhuKien', 'Product2');
        Route::resource('Ghe-Gaming', 'Product3');
        Route::resource('Ban-Gaming', 'Product4');
    });
    //Banner
    Route::resource('Banner', 'Banner');
    //User
    Route::resource('User', 'User');
    Route::group(['prefix'=>'chart'],function (){
        Route::get('thong-ke-tong-hop.html','Chart@chart');
        Route::get('top-10-may-tinh-ban-chay-nhat-trong-thang.html','Chart@chart1');
        Route::get('top-10-phu-kien-ban-chay-nhat-trong-thang.html','Chart@chart2');
        Route::get('top-20-may-tinh-ban-chay-nhat-trong-thang.html','Chart@chart3');
        Route::get('top-20-phu-kien-ban-chay-nhat-trong-thang.html','Chart@chart4');
    });
    //Roles
    Route::resource('Roles','Roles');
});

// Home
Route::group(['prefix' => '/', 'namespace' => 'home'], function () {
    Route::get('/', 'home@index')->name('home');
    Route::post('login', 'Home@login')->name('home-login');
    Route::get('logout', 'Home@logout')->name('home-logout');
    Route::get('sign-up', 'Home@sign_up');
    Route::post('sign-up-post', 'Home@sign_up_post')->name('sign-up-post');
    Route::group(['prefix' => 'cart'], function() {
        Route::get('/','Cart@cart')->name('cart');
        Route::get('add/{id}','Cart@add')->name('cart.add');
        Route::get('remove/{id}','Cart@remove')->name('cart.remove');
        Route::get('update/{id}','Cart@update')->name('cart.update');
        Route::get('clear','Cart@clear')->name('cart.clear');
    });
    Route::get('order','Order@index')->name('order');
    Route::post('post-order','Order@post_order')->name('post-order');
    Route::get('detail/{id}','Detail@index')->name('detail');
    Route::get('may-tinh.com','Laptop@index');
    Route::get('phu-kien.com','PhuKien@index');
    Route::get('ban-gaming.com','BanGaming@index');
    Route::get('ghe-gaming.com','GheGaming@index');
    //search ajax
    Route::post('search', 'Home@getSearchAjax')->name('search');
});
