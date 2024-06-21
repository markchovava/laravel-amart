<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSpecController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('app-info')->group(function() {
    Route::get('/', [AppInfoController::class, 'view']);
    Route::post('/', [AppInfoController::class, 'update']);
});


Route::prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'view']);
});


Route::prefix('product-category')->group(function() {
    Route::post('/', [ProductCategoryController::class, 'store']);
    Route::get('/by-product/{id}', [ProductCategoryController::class, 'indexByProductId']);
    Route::delete('/{id}', [ProductCategoryController::class, 'delete']);
});

Route::prefix('role')->group(function() {
    Route::get('/', [RoleController::class, 'index']);
    Route::get('/{id}', [RoleController::class, 'view']);
});

/* CATEGORY */
Route::get('category', [CategoryController::class, 'index']);
Route::get('category-all', [CategoryController::class, 'indexAll']);
Route::get('category/{id}', [CategoryController::class, 'view']);
Route::get('category-products/{id}', [CategoryController::class, 'indexCategoryProducts']);
Route::get('category-featured', [CategoryController::class, 'indexFeatured']);
Route::get('category-featured-4', [CategoryController::class, 'indexFeatured4']);
Route::get('category-top-selling', [CategoryController::class, 'indexTopSelling']);
Route::get('category-products-by-slug', [CategoryController::class, 'indexBySlug']);
Route::get('category-by-slug', [CategoryController::class, 'viewBySlug']);

/* BRANDS */
Route::get('brand-all', [BrandController::class, 'indexAll']);
Route::get('brand/{id}', [BrandController::class, 'view']);
Route::get('brand-products/{id}', [BrandController::class, 'brandProducts']);

Route::get('/delivery-all', [DeliveryController::class, 'indexAll']);

/* PRODUCT */
Route::get('product/{id}', [ProductController::class, 'view']);

/* PRODUCT SPECIFICATIONS */
Route::get('product-spec-by-product-id/{id}', [ProductSpecController::class, 'indexByProductId']);
/* PRODUCT VARIATION */
Route::get('product-variation-by-product-id/{id}', [ProductVariationController::class, 'indexByProductId']);

Route::get('/product-category-by-product-id/{id}', [ProductCategoryController::class, 'indexByProductId']);

/* CART */
Route::post('cart/', [CartController::class, 'store']);
Route::get('cart-session', [CartController::class, 'cartSession']);
Route::get('cart-view', [CartController::class, 'view']);
Route::post('cart/{id}', [CartController::class, 'update']);

/* CART ITEM */
Route::delete('cart-item/{id}', [CartItemController::class, 'delete']);

Route::get('order/', [OrderController::class, 'index']);
Route::get('order/{id}', [OrderController::class, 'view']);


Route::get('/product-category-by-id/{id}', [ProductCategoryController::class, 'indexByProductId']);

/* PRODUCT SUB-CATEGORY */
Route::get('/product-sub-category-by-id/{id}', [ProductSubCategoryController::class, 'subCategoriesByProductId']);

/* SUB-CATEGORY */
Route::prefix('sub-category')->group(function() {
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::get('/{id}', [SubCategoryController::class, 'view']);
});
Route::get('/sub-category-all', [SubCategoryController::class, 'indexAll']);
Route::get('/sub-category-by-category-id/{id}', [SubCategoryController::class, 'subCategoryByCategoryId']);

Route::prefix('shop')->group(function() {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/{id}', [ShopController::class, 'view']);
});
Route::get('/shop-all', [ShopController::class, 'indexAll']);





