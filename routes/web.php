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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index')->name('index');
Route::resource('collections', 'CollectionController');
Route::resource('products', 'ProductController');
Route::resource('reviews', 'ReviewController');
Route::resource('orders', 'OrderController');
Route::get('subcategory/{subcategory}/products', 'ProductController@productsBySubCategoryId')->name('subcategory.products');
Route::post('products/search', 'ProductController@search');
Route::post('orders/cache', 'OrderController@cache');
Route::get('collections/{id}/products', 'CollectionController@productsByCollectionId');
Route::get('/leftSidebar', function () {
    return view('front.shop-left-sidebar');
})->name('leftSidebar');

Route::get('/singleProduct', function () {
    return view('front.single-product');
})->name('singleProduct');


Route::get('/blogs', function () {
    return view('front.blog-3-column');
})->name('blogs');


Route::get('/blog/details', function () {
    return view('front.blog-details');
})->name('blog.details');

Route::get('/aboutUs', function () {
    return view('front.about-us');
})->name('aboutUs');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

Route::get('/cart', function () {
    return view('front.cart');
})->name('cart');

Route::get('/404', function () {
    return view('front.404');
})->name('404');


