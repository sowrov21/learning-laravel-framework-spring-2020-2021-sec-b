<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesSystemController;
use App\Http\Controllers\PhysicalStoreChannelController;

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

        Route::get('/social_media', [SalesSystemController::class,'mediaLog'])->name('SalesSystemController.mediaLog');

        Route::get('/ecommerce', [SalesSystemController::class,'ecommerceLog'])->name('SalesSystemController.ecommerceLog');
       
        //Physical Store
        Route::get('physical_store/salesLog/', [PhysicalStoreChannelController::class,'viewSalesLog'])->name('PhysicalStoreChannelController.viewSalesLog');
        Route::get('physical_store/salesLog/submit/{id}', [PhysicalStoreChannelController::class,'salesLogData'])->name('PhysicalStoreChannelController.salesLogData');
    });


    Route::group(['prefix' => 'system/product_management'], function () {

        Route::get('/existing_products', [ProductController::class,'existing_products'])->name('ProductController.existing_products');

        Route::get('/all_products', [ProductController::class,'all_products'])->name('ProductController.all_products');

        Route::get('/upcoming_products', [ProductController::class,'upcoming_products'])->name('ProductController.upcoming_products');

        Route::get('/add_product', [ProductController::class,'add_product_form'])->name('ProductController.add_product_form');
        Route::post('/add_product', [ProductController::class,'add_product_store'])->name('ProductController.add_product_store');

        //datatable

        Route::get('/existing_products/edit/{id}', [ProductController::class,'edit_existing'])->name('ProductController.edit_existing');
        Route::post('/existing_products/edit/{id}', [ProductController::class,'update_existing'])->name('ProductController.update_existing');

        Route::delete('/existing_products/delete/{id}', [ProductController::class,'destroy_existing'])->name('ProductController.destroy_existing');

        Route::get('/product/details/{product_id}', [ProductController::class,'show'])->name('ProductController.show');
     

        Route::get('/upcoming_products/edit/{id}', [ProductController::class,'edit_upcoming'])->name('ProductController.edit_upcoming');
        Route::post('/upcoming_products/edit/{id}', [ProductController::class,'update_upcoming'])->name('ProductController.update_upcoming');

        Route::delete('/upcoming_products/delete/{id}', [ProductController::class,'destroy_upcoming'])->name('ProductController.destroy_upcoming');


        Route::get('/all_products/edit/{id}', [ProductController::class,'edit_all'])->name('ProductController.edit_all');
        Route::post('/all_products/edit/{id}', [ProductController::class,'update_all'])->name('ProductController.update_all');

        Route::delete('/all_products/delete/{id}', [ProductController::class,'destroy_all'])->name('ProductController.destroy_all');


    });

    
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
