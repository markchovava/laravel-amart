<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductSpecController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCustomerController;
use App\Http\Controllers\UserDeliveryController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\UserOperatorController;
use App\Http\Controllers\UserRetailerController;
use App\Http\Controllers\UserSupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post('/password', [AuthController::class, 'password']);
    Route::get('/logout', [AuthController::class, 'logout']);
    
    Route::prefix('auth')->group(function() {
        Route::get('/', [AuthController::class, 'view']);
        Route::post('/', [AuthController::class, 'update']);
        Route::post('/email', [AuthController::class, 'emailUpdate']);
    });

    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/index-all', [CategoryController::class, 'indexAll']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'view']);
        Route::post('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });
    Route::get('/category-all', [CategoryController::class, 'indexAll']);

    Route::prefix('shop')->group(function() {
        Route::get('/', [ShopController::class, 'index']);
        Route::post('/', [ShopController::class, 'store']);
        Route::get('/{id}', [ShopController::class, 'view']);
        Route::post('/{id}', [ShopController::class, 'update']);
        Route::delete('/{id}', [ShopController::class, 'delete']);
    });
    Route::get('/shop-all', [ShopController::class, 'indexAll']);

    Route::prefix('brand')->group(function() {
        Route::get('/', [BrandController::class, 'index']);
        Route::post('/', [BrandController::class, 'store']);
        Route::get('/{id}', [BrandController::class, 'view']);
        Route::post('/{id}', [BrandController::class, 'update']);
        Route::delete('/{id}', [BrandController::class, 'delete']);
    });

    Route::prefix('product')->group(function() {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'view']);
        Route::post('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'delete']);
    });
    Route::post('/product-category', [ProductCategoryController::class, 'store']);
    Route::delete('/product-category/{id}', [ProductCategoryController::class, 'delete']);
    Route::get('/product-category-by-product-id/{id}', [ProductCategoryController::class, 'indexByProductId']);

    Route::prefix('product-image')->group(function() {
        Route::delete('/{id}', [ProductImageController::class, 'delete']);
    });

    /* PRODUCT SPECIFICATIONS */
    Route::get('product-spec-by-product-id/{id}', [ProductSpecController::class, 'indexByProductId']);
    Route::post('product-spec', [ProductSpecController::class, 'store']);
    Route::delete('product-spec/{id}', [ProductSpecController::class, 'delete']);
    /* PRODUCT VARIATION */
    Route::get('product-variation-by-product-id/{id}', [ProductVariationController::class, 'indexByProductId']);
    Route::post('product-variation', [ProductVariationController::class, 'store']);
    Route::delete('product-variation/{id}', [ProductVariationController::class, 'delete']);

    Route::post('shop-category', [ShopCategoryController::class, 'store']);
    Route::get('shop-category-by-id/{id}', [ShopCategoryController::class, 'indexByShopId']);
    Route::delete('shop-category/{id}', [ShopCategoryController::class, 'delete']);

    /* SUB-CATEGORY */
    Route::prefix('sub-category')->group(function() {
        Route::get('/', [SubCategoryController::class, 'index']);
        Route::post('/', [SubCategoryController::class, 'store']);
        Route::get('/{id}', [SubCategoryController::class, 'view']);
        Route::post('/{id}', [SubCategoryController::class, 'update']);
        Route::delete('/{id}', [SubCategoryController::class, 'delete']);
    });
    Route::get('/sub-category-all', [SubCategoryController::class, 'indexAll']);
    Route::get('/sub-category-by-category-id/{id}', [SubCategoryController::class, 'subCategoryByCategoryId']);

    /* PRODUCT SUB-CATEGORY */
    Route::post('/product-sub-category', [ProductSubCategoryController::class, 'store']);
    Route::delete('/product-sub-category/{id}', [ProductSubCategoryController::class, 'delete']);
    Route::get('/product-sub-category-by-id/{id}', [ProductSubCategoryController::class, 'subCategoriesByProductId']);

    /* USER */
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'view']);
        Route::post('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });
    /* USER CUSTOMER */
    Route::prefix('user-customer')->group(function() {
        Route::get('/', [UserCustomerController::class, 'index']);
        Route::post('/', [UserCustomerController::class, 'store']);
        Route::get('/{id}', [UserCustomerController::class, 'view']);
        Route::post('/{id}', [UserCustomerController::class, 'update']);
        Route::delete('/{id}', [UserCustomerController::class, 'delete']);
    });

    Route::prefix('user-delivery')->group(function() {
        Route::get('/', [UserDeliveryController::class, 'index']);
        Route::post('/', [UserDeliveryController::class, 'store']);
        Route::get('/{id}', [UserDeliveryController::class, 'view']);
        Route::post('/{id}', [UserDeliveryController::class, 'update']);
        Route::delete('/{id}', [UserDeliveryController::class, 'delete']);
    });

    Route::prefix('user-retailer')->group(function() {
        Route::get('/', [UserRetailerController::class, 'index']);
        Route::post('/', [UserRetailerController::class, 'store']);
        Route::get('/{id}', [UserRetailerController::class, 'view']);
        Route::post('/{id}', [UserRetailerController::class, 'update']);
        Route::delete('/{id}', [UserRetailerController::class, 'delete']);
    });

    Route::prefix('user-supplier')->group(function() {
        Route::get('/', [UserSupplierController::class, 'index']);
        Route::post('/', [UserSupplierController::class, 'store']);
        Route::get('/{id}', [UserSupplierController::class, 'view']);
        Route::post('/{id}', [UserSupplierController::class, 'update']);
        Route::delete('/{id}', [UserSupplierController::class, 'delete']);
    });
    Route::prefix('user-manager')->group(function() {
        Route::get('/', [UserManagerController::class, 'index']);
        Route::post('/', [UserManagerController::class, 'store']);
        Route::get('/{id}', [UserManagerController::class, 'view']);
        Route::post('/{id}', [UserManagerController::class, 'update']);
        Route::delete('/{id}', [UserManagerController::class, 'delete']);
    });
    Route::prefix('user-operator')->group(function() {
        Route::get('/', [UserOperatorController::class, 'index']);
        Route::post('/', [UserOperatorController::class, 'store']);
        Route::get('/{id}', [UserOperatorController::class, 'view']);
        Route::post('/{id}', [UserOperatorController::class, 'update']);
        Route::delete('/{id}', [UserOperatorController::class, 'delete']);
    });
    Route::prefix('delivery')->group(function() {
        Route::get('/', [DeliveryController::class, 'index']);
        Route::post('/', [DeliveryController::class, 'store']);
        Route::get('/{id}', [DeliveryController::class, 'view']);
        Route::post('/{id}', [DeliveryController::class, 'update']);
        Route::delete('/{id}', [DeliveryController::class, 'delete']);
    });



    Route::prefix('role')->group(function() {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'view']);
        Route::post('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'delete']);
    });

    Route::prefix('app-info')->group(function() {
        Route::get('/', [AppInfoController::class, 'view']);
        Route::post('/', [AppInfoController::class, 'update']);
    });

    Route::prefix('order')->group(function() {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::get('/{id}', [OrderController::class, 'view']);
        Route::delete('/{id}', [OrderController::class, 'delete']);
    });
    Route::post('order/cart-store', [OrderController::class, 'storeFromCart']);
    Route::post('order-status', [OrderController::class, 'status']);
    Route::get('order-by-user', [OrderController::class, 'orderByUser']);

    Route::prefix('product-category')->group(function() {
        Route::post('/', [ProductCategoryController::class, 'store']);
        Route::get('/by-product/{id}', [ProductCategoryController::class, 'indexByProductId']);
        Route::delete('/{id}', [ProductCategoryController::class, 'delete']);
    });



});
