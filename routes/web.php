<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Users\RegisterController;

use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\OrderDetailsController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::get('admin/users/register', [RegisterController::class, 'index'])->name('register');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::post('admin/users/register/store', [RegisterController::class, 'store']);
Route::get('admin/users/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Contact
        Route::get('contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contact');
        Route::delete('contact/destroy', [\App\Http\Controllers\Admin\ContactController::class, 'destroy']);

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::DELETE('customers/destroy', [\App\Http\Controllers\Admin\CartController::class, 'destroy']);
        Route::put('admin/carts/update/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'update'])->name('admin.carts.update');
      
       
      
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

Route::get('contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('order-history', [OrderHistoryController::class, 'index'])->name('order.history');
    Route::get('order-details/{id}', [OrderDetailsController::class, 'show'])->name('order.details');
});

