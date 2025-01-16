<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsUserAuthenticated;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/signup', [UserController::class, 'signup'])->name('signup-form');
Route::post('/signup-new-user', [UserController::class, 'signup'])->name('add-new-user');
Route::get('/signup-for-seller', [UserController::class, 'signup_for_seller'])->name('signup-form-for-seller');
Route::post('/signup-new-seller', [UserController::class, 'signup_for_seller'])->name('add-new-seller');

Route::get('/login', [UserController::class, 'login'])->name('login-form');
Route::post('/user-login', [UserController::class, 'login'])->name('user-login');

Route::post('/user-logout', [UserController::class, 'logout'])->name('user-logout');

Route::get('/add-new-product-form', [ProductController::class, 'add_new_product'])->name('product-form')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');
Route::post('/submit-new-product-data', [ProductController::class, 'add_new_product'])->name('submit-product-data')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');

Route::get('/add-new-category-form', [ProductController::class, 'category'])->name('category-form')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');
Route::post('/submit-new-category-data', [ProductController::class, 'category'])->name('submit-category-data')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');

Route::get('/show-products/{category}', [ProductController::class, 'show_products'])->name('show-products');

Route::get('/show-product-page/{id}', [ProductController::class, 'show_specific_product'])->name('show-specific-product');

Route::post('/add-item-to-cart', [ProductController::class, 'handle_cart'])->name('user-cart-details-post')->middleware(IsUserAuthenticated::class);
Route::get('/show-cart-for-user', [ProductController::class, 'handle_cart'])->name('user-cart-details-get')->middleware(IsUserAuthenticated::class);
Route::post('/remove-item-from-cart', [ProductController::class, 'remove_product_from_cart'])->name('remove-cart-item')->middleware(IsUserAuthenticated::class);

Route::get('/show-address-form', [UserController::class, 'handle_address'])->name('show-address-form')->middleware(IsUserAuthenticated::class);
Route::get('/show-all-addresses', [UserController::class, 'show_all_addresses'])->name('show-all-addresses')->middleware(IsUserAuthenticated::class);
Route::post('/remove-existing-address', [UserController::class, 'remove_address'])->name('remove-address')->middleware(IsUserAuthenticated::class);
Route::post('/add-new-address', [UserController::class, 'handle_address'])->name('add-new-address')->middleware(IsUserAuthenticated::class);

Route::post('/select-address-for-payment', [OrderController::class, 'show_addresses'])->name('select-address-for-payment')->middleware(IsUserAuthenticated::class);
Route::post('/select-payment-method', [OrderController::class, 'show_payment_method'])->name('handle-payment')->middleware(IsUserAuthenticated::class);

Route::get('/show-order-details', [OrderController::class, 'handle_orders'])->name('show-orders')->middleware(IsUserAuthenticated::class);
Route::post('/submit-new-order', [OrderController::class, 'handle_orders'])->name('handle-orders')->middleware(IsUserAuthenticated::class);

Route::get('/show-all-products-added-by-seller', [ProductController::class, 'show_products_for_seller'])->name('show-seller-products')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');

Route::get('/edit-product-data/{product_id}', [ProductController::class, 'edit_product_data'])->name('edit-product-for-seller')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');
Route::post('/submit-updated-product-data', [ProductController::class, 'submit_product_data'])->name('submit-product-data-for-seller')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');
Route::post('/delete-product-data', [ProductController::class, 'delete_product_data'])->name('delete-product-data')->middleware(IsUserAuthenticated::class)->middleware('can:isSeller');

Route::get('/search', [ProductController::class, 'search_product'])->name('search-product');

