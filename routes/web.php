<?php

use App\Contact;
use Illuminate\Support\Facades\Auth;
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
Route::get('/clear', function () {
   session()->flush();
  // dd(session()->get('productsCardSession'));
   //session()->forget('productsCardSession');
});
/* Route::get('/welcome', function () {
    return view('welcome');
}); */
Route::get('/checkout', function () {
    return view('front.checkout');
});
// to delete
Route::get('/mail', function () {

    $order = \App\Order::find(52);
    $contact = Contact::first();

    /* return view('emails.orders.confirmation', [
        'order' => $order,
    ]); */
    return view('emails.orders.confirmation', [
        'order' => $order,
        'contact' => $contact,
    ]);
});

// to delete
Route::get('/verify', function () {

    return view('auth.verify');
});
//Route::put('/myaccount/{myaccount}/address', 'MyAccountController@address')->name('myaccount.address');
Route::resource('myaccount', 'MyAccountController')->middleware('verified');

/* login form for customer*/
Route::get('/loginForm','LoginController@loginForm')->name('login.form');
Route::get('/registerForm','LoginController@registerForm')->name('register.form');
Route::get('/administrationhome','AdministrationController@index')->middleware('auth');

//Route::get('redirection', 'DashboardController@index')->name('admin.index')->middleware('auth');

/* Route::get('/categories', function () {
    return view('backoffice.categories.list');
}); */

Route::get('/administration', function () {
    return view('backoffice.auth.login');
})->name('back.login');
/** admisitration routes */
Route::get('/admin/collections', 'CollectionController@adminCollections');
Route::get('products/{id}/material/{material}', 'ImageController@getproductsImagesByMaterial');
Route::get('/', 'HomeController@index')->name('index');
Route::post('collections/active/{id}', 'CollectionController@active');
Route::post('categories/active/{id}', 'CategoryController@active');
Route::post('products/active/{id}', 'ProductController@active');
Route::post('images/active/{id}', 'ImageController@active');
Route::get('products/{id}/images', 'ProductController@imagesByProductId');

Route::get('products/{id}/images/form', 'ImageController@formImageToProduct');
Route::post('subcategories/active/{id}', 'SubCategoryController@active');
Route::resource('collections', 'CollectionController');
Route::resource('products', 'ProductController');
Route::resource('reviews', 'ReviewController');
Route::resource('subcategories', 'SubCategoryController');
Route::resource('categories', 'CategoryController');
Route::resource('images', 'ImageController');
Route::get('orders/notconfirmed/list', 'OrderController@listNotConfirmed');
Route::get('orders/inprogress/list', 'OrderController@listInprogress');
Route::get('orders/canceled/list', 'OrderController@listCanceled');
Route::get('orders/confirmed/list', 'OrderController@listConfirmed');
Route::post('orders/{id}/status', 'OrderController@updateStatut');
Route::resource('orders', 'OrderController');


Route::get('subcategory/{subcategory}/products', 'ProductController@productsBySubCategoryId')->name('subcategory.products');

Route::get('search/product', 'ProductController@search');

Route::post('carts/store', 'CartController@store');
Route::get('collections/{id}/products', 'CollectionController@productsByCollectionId');
Route::delete('carts/{id}/material/{material}/delete', 'CartController@delete');
Route::post('carts/quantity/update', 'CartController@updateQuantity');
Route::post('carts/size/update', 'CartController@updateSize');
Route::resource('newsletters','NewsLetterController')->only('store');
Route::post('newsletters/stop', 'NewsLetterController@stop');
Route::resource('contacts', 'MessageController');


//Route::resource('blogs','BlogController');
Route::resource('comments','CommentController');
Route::resource('users','UserController')->middleware('auth');


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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
