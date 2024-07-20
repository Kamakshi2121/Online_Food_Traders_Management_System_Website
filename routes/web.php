<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\frontendcontroller;
use App\Http\Controllers\admin\dashboardcontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\Admin\ordercontroller;
use App\Http\Controllers\frontend\frontcontroller;
use App\Http\Controllers\frontend\cartcontroller;
use App\Http\Controllers\frontend\checkoutcontroller;
use App\Http\Controllers\frontend\usercontroller;
use App\Http\Controllers\Frontend\wishlistcontroller;

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', [frontcontroller::class, 'index']);
Route::get('category', [frontcontroller::class, 'category']);
Route::get('viewcategory/{meta_title}', [frontcontroller::class, 'viewcategory']);
Route::get('category/{cate_meta_title}/{prod_meta_title}', [frontcontroller::class, 'productview']);

Auth::routes();

//Route::get('load-cart-data', [cartcontroller::class, 'cartcount']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Add to cart
Route::post('add_to_cart', [cartcontroller::class, 'addProduct'] );
Route::post('delete-cart-item', [cartcontroller::class, 'deleteproduct']);
Route::post('updateCart', [cartcontroller::class, 'updatecart']);

//wishlist
Route::post('add_to_wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

Route::middleware(['auth'])->group(function(){
    // cart
    Route::get('cart', [cartcontroller::class, 'viewcart']);
    // checkout
    Route::get('checkout', [checkoutcontroller::class, 'index']);
    //placeorder
    Route::post('placeOrder', [checkoutcontroller::class, 'placeorder']);
    // order and view order ofr user
    Route::get('my-orders', [usercontroller::class, 'index']);
    Route::get('vieworder/{id}', [usercontroller::class, 'view']);

    //wishlist
    Route::get('wishlist', [wishlistcontroller::class, 'index']);

    //payment
    Route::post('procced-to-pay', [checkoutcontroller::class, 'razorpaycheck']);
    
    //rating
    Route::post('add-rating', [Ratingcontroller::class, 'add']);

    });    

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', 'App\Http\Controllers\admin\frontendcontroller@index');
    // Category Controller
    Route::get('categories', [categorycontroller::class, 'index']);
    Route::get('add-category', [categorycontroller::class, 'add']);
    Route::post('insert-category', [categorycontroller::class, 'insert']);
    Route::get('edit-category/{id}', [categorycontroller::class, 'edit']);
    Route::put('update-category/{id}', [categorycontroller::class, 'update']);
    Route::get('delete-category/{id}', [categorycontroller::class, 'destroy']);

    // Product Controller
    Route::get('products', [productcontroller::class, 'index']);
    Route::get('add-products', [productcontroller::class, 'add']);
    Route::post('insert-products', [productcontroller::class, 'insert']);
    Route::get('edit-product/{id}', [productcontroller::class, 'edit']);
    Route::put('update-product/{id}', [productcontroller::class, 'update']);
    Route::get('delete-product/{id}', [productcontroller::class, 'destroy']);

    //Order Controller for admin
    Route::get('orders', [ordercontroller::class, 'index']);
    Route::get('admin/view-order/{id}', [ordercontroller::class, 'view']);
    Route::put('update-order/{id}', [ordercontroller::class, 'updateorder']);
    Route::get('orderHistory', [ordercontroller::class, 'orderhistory']);

    //user side controller for admin
    Route::get('users', [dashboardcontroller::class, 'users']);
    Route::get('view-user/{id}', [dashboardcontroller::class, 'viewuser']);
 });
 