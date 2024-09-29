<?php

use Illuminate\Support\Facades\Route;


// Admin
use App\Http\Controllers\AdminController;

Route::get('/admincp', [AdminController::class, 'index']);
Route::get('/login-admin', [AdminController::class, 'admin_login_index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/login', [AdminController::class, 'login']);

// Categories Product
use App\Http\Controllers\CategoryController;

Route::get('/add-category-product', [CategoryController::class, 'add_category_product']);
Route::get('/list-category-product', [CategoryController::class, 'list_category_product']);

Route::get('/edit-category-product/{categories_product_id}', [CategoryController::class, 'edit_category_product']);
Route::get('/delete-category-product/{categories_product_id}', [CategoryController::class, 'delete_category_product']);

Route::get('/active-cate-product/{categories_product_id}', [CategoryController::class, 'active_category_product']);
Route::get('/inactive-cate-product/{categories_product_id}', [CategoryController::class, 'inactive_category_product']);

Route::post('/save-category-product', [CategoryController::class, 'save_category_product']);
Route::post('/update-category-product/{categories_product_id}', [CategoryController::class, 'update_category_product']);


// Brand
use App\Http\Controllers\BrandController;

Route::get('/add-brand', [BrandController::class, 'add_brand']);
Route::get('/list-brand', [BrandController::class, 'list_brand']);

Route::get('/active-brand/{brand_id}', [BrandController::class, 'active_brand']);
Route::get('/inactive-brand/{brand_id}', [BrandController::class, 'inactive_brand']);


Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit_brand']);

Route::post('/save-brand', [BrandController::class, 'save_brand']);

Route::post('/update-brand/{brand_id}', [BrandController::class, 'update_brand']);

Route::get('/delete-brand/{brand_id}', [BrandController::class, 'delete_brand']);


// Products
use App\Http\Controllers\ProductControll;

Route::get('/add-product', [ProductControll::class, 'add_product']);
Route::get('/list-product', [ProductControll::class, 'list_product']);

Route::get('/active-product/{product_id}', [ProductControll::class, 'active_product']);
Route::get('/inactive-product/{product_id}', [ProductControll::class, 'inactive_product']);
Route::get('/edit-product/{product_id}', [ProductControll::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductControll::class, 'delete_product']);

Route::post('/save-product', [ProductControll::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductControll::class, 'update_product']);



///////////////////////////// Users///////////////////

// Home controller
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/detail-product/{product_id}', [HomeController::class, 'detail_product']);
Route::post('/search', [HomeController::class, 'search']);


// Users account
use App\Http\Controllers\CheckoutController;
// Users account
Route::get('/login-index', [CheckoutController::class, 'login_index']);

Route::get('/register-index', [CheckoutController::class, 'register_index']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);


// Check out
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/logout', action: [CheckoutController::class, 'logout']);

Route::post('/select-wards-shipping', [CheckoutController::class, 'select_wards_shipping']);
Route::post('/select-district-shipping', [CheckoutController::class, 'select_district_shipping']);

Route::post('/order-product', [CheckoutController::class, 'order_product']);

Route::post('/get-feeship', [CheckoutController::class, 'get_feeship']);

// Cart Product
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index']);

Route::post('/add-cart', [CartController::class, 'addToCart']);
Route::get('/increase-quantity/{product_id}', [CartController::class, 'increaseProduct']);
Route::get('/decrease-quantity/{product_id}', [CartController::class, 'decreaseProduct']);
Route::get('/delete/{session_id}', [CartController::class, 'delete']);
Route::get('/delete-all', [CartController::class, 'delete_all_cart']);
Route::get('/delete-coupon', [CartController::class, 'delete_coupon']);

Route::get('count-cart', [CartController::class, 'count_cart']);


Route::post('/check-coupon', [CartController::class, 'check_coupon']);

// Coupons

use App\Http\Controllers\CouponsController;

Route::get('/add-discount-code', [CouponsController::class, 'add_discount']);
Route::post('/save-coupon', [CouponsController::class, 'save_coupons']);
Route::get('/list-coupons', [CouponsController::class, 'list_coupons']);
Route::get('/delete-coupon/{id_coupon}', [CouponsController::class, 'delete_coupon']);

use App\Http\Controllers\OrderController;

Route::get('/order-view', [OrderController::class, 'order_view']);
Route::get('/view-detail/{order_code}', [OrderController::class, 'view_detail']);
Route::get('/accept/{order_code}', [OrderController::class, 'accept']);
Route::get('/not-accept/{order_code}', [OrderController::class, 'not_accept']);

use App\Http\Controllers\SlideController;

Route::get('/add-slide', [SlideController::class, 'new_slide']);
Route::post('/save-slide', [SlideController::class, 'save_slide']);



use App\Http\Controllers\FeeshipController;

Route::get('/feeship', [FeeshipController::class, 'feeship']);
Route::post('/add-feeship', [FeeshipController::class, 'add_feeship']);
