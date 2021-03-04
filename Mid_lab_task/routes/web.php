<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesSystemController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('auth/login', [LoginController::class,'login'])->name('login.custom');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/admin',[LoginController::class,'adminDashboard'])->name('admin.dashboard');
        Route::get('/customer',[LoginController::class,'customerDashboard'])->name('customer.dashboard');
        Route::get('/accountant',[LoginController::class,'accountantDashboard'])->name('accountant.dashboard');
        Route::get('/salesman',[LoginController::class,'salesmanDashboard'])->name('salesman.dashboard');
        Route::get('/businesspartner',[LoginController::class,'businesspartnerDashboard'])->name('businesspartner.dashboard');
        Route::get('/vendor',[LoginController::class,'vendorDashboard'])->name('vendor.dashboard');
    });

    Route::group(['prefix' => 'system/sales'], function () {

        Route::get('/physical_store', [SalesSystemController::class,'physicalStore'])->name('SalesSystemController.physicalStore');

        Route::get('physical_store/salesLog', [SalesSystemController::class,'salesLog'])->name('SalesSystemController.salesLog');
        Route::post('physical_store/salesLog', [SalesSystemController::class,'salesLogData'])->name('SalesSystemController.salesLog');

        Route::get('/social_media', [SalesSystemController::class,'mediaLog'])->name('SalesSystemController.mediaLog');

        Route::get('/ecommerce', [SalesSystemController::class,'ecommerceLog'])->name('SalesSystemController.ecommerceLog');
    });


    Route::group(['prefix' => 'system/product_management'], function () {

        Route::get('/existing_products', [ProductController::class,'existing_products'])->name('ProductController.existing_products');

        Route::get('/upcoming_products', [ProductController::class,'upcoming_products'])->name('ProductController.upcoming_products');

        Route::get('/add_product', [ProductController::class,'add_product'])->name('ProductController.add_product');

        //datatable

        Route::get('/existing_products/edit/{id}', [ProductController::class,'edit'])->name('ProductController.edit');
        Route::post('/existing_products/edit/{id}', [ProductController::class,'update'])->name('ProductController.update');

        Route::delete('/existing_products/delete/{id}', [ProductController::class,'destroy'])->name('ProductController.destroy');

        Route::get('/product/{product_id}', [ProductController::class,'show'])->name('ProductController.show');

    });

    
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
