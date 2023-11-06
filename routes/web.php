<?php

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Laporan_IN_Controller;
use App\Http\Controllers\Laporan_OUT_Controller;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Product_IN_Controller;
use App\Http\Controllers\Product_OUT_Controller;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

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

    Route::get('/login',[SessionController::class,'login'])->name('login');
    Route::post('/loginProses',[SessionController::class,'loginProses'])->name('loginProses');
    Route::get('/register',[SessionController::class,'register'])->name('register');
    Route::post('/registerProses',[SessionController::class,'registerProses'])->name('registerProses');
   

Route::middleware(['auth'])->group(function () {

    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::post('/logout',[SessionController::class,'logout'])->name('logout');

});

  

Route::group(['middleware'=>['auth','ceklevel:admin']], function(){
        
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('supplier', SupplierController::class);

   
});

Route::group(['middleware'=>['auth','ceklevel:staff,head staff,admin']], function(){

    Route::resource('transaksi_IN', Product_IN_Controller::class);
    Route::resource('transaksi_OUT', Product_OUT_Controller::class);

    Route::post('/getProduct',[Product_IN_Controller::class,'getProduct'])->name('getProduct');

});


Route::group(['middleware'=>['auth','ceklevel:manager,head staff,admin']], function(){

    Route::resource('laporanIN', Laporan_IN_Controller::class);
    Route::resource('laporanOUT', Laporan_OUT_Controller::class);

    Route::get('/filterData',[Laporan_IN_Controller::class,'filterData'])->name('filterData');
    Route::get('/filterDataOUT',[Laporan_OUT_Controller::class,'filterDataOUT'])->name('filterDataOUT');


});

Route::group(['middleware'=>['auth','ceklevel:staff']], function(){

    Route::get('/allProduct',[ProductController::class,'allProduct'])->name('allProduct');
   
});

Route::group(['middleware'=>['auth','ceklevel:head staff,admin']], function(){

    Route::resource('product', ProductController::class);

    Route::get('/viewPDF',[ExportController::class,'viewPDF'])->name('viewPDF');
    Route::get('/laporanIN_PDF',[ExportController::class,'laporanIN_PDF'])->name('laporanIN_PDF');
    
    Route::get('/exportExcel',[ExportController::class,'exportExcel'])->name('exportExcel');

   
});

