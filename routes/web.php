<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Brand\Index;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [FrontendController::class, 'index']);
Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);
Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{orderId}', [OrderController::class, 'show']);

});

Route::get('thank-you', [FrontendController::class, 'thankyou']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}/', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });

    //category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}/', 'update');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}/', 'update');
        Route::get('products/{product_id}/delete', 'destroy');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });
    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}/', 'update');
        Route::get('colors/{id}/delete', 'destroy');
    });

    Route::get('/brands', Index::class);
});
