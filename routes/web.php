<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AjaxController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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


Route::get('/',[HomeController::class,'home']);
Route::get('/pricing',[HomeController::class,'Showpricing']);
Route::get('/contact',[HomeController::class,'Showcontact']);
Route::post('/sendemail', [HomeController::class, 'sendEmail']);
Route::get('/about',[HomeController::class,'Showabout']);


Route::post('/search-image', [ImagesController::class, 'searchImages'])->name('search-image');
Route::get('/search-image',function(){
    return redirect('/');
});



Route::group(['middleware'=>['guest_members']],function(){

    Route::get('/login',[HomeController::class,'ShowLogin']);
    Route::post('/signup', [HomeController::class, 'singnUpProcess']);
    Route::post('/signin', [HomeController::class, 'signInProcess']);

});

Route::group(['middleware'=>['members']],function(){

    Route::get('singout',function(){
        session()->forget('unlocker_user');
        return redirect('/login');
    });
    Route::get('/cart/{id}',[HomeController::class,'Showcart']);
    Route::post('/processtopay', [OrderController::class, 'processtoPay']);
    Route::get('/checkout',[OrderController::class,'showCheckout']);
    Route::get('/orders',[OrderController::class,'viewOrders']);
    Route::post('/paymentprocess', [OrderController::class, 'Paymentprocess'])->name('payment.process');
});


Route::group(['prefix'=>'admin'],function(){

    Route::get('/',function(){return redirect('/admin/login');});

    Route::get('/orders',[AdminController::class,'viewOrders']);
    Route::get('/users',[AdminController::class,'viewUsers']);
    Route::get('/update-price',[AdminController::class,'ViewPrice']);
    Route::post('/update-price-process',[AdminController::class,'UpdatePrice']);

    Route::get('/login', [AdminController::class, 'adminlogin']);
    Route::post('/signin', [AjaxController::class, 'signinprocess']);
    Route::post('/change', [AjaxController::class, 'changeprocess']);
    Route::get('/logout',function(){ session()->forget('unlocker'); return redirect('/admin/login');});
    
    Route::group(['middleware'=>['administrator']],function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        Route::get('/category', [CategoryController::class, 'category']);
        Route::get('/create-category', [CategoryController::class, 'createCategory']);
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory']);
        Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::post('/update-category', [CategoryController::class, 'updateCategory'])->name('update-category');

        Route::get('/upload-tiles/{catid}', [ImagesController::class, 'uploadTiles']);
        Route::get('/view-tiles/{catid}', [ImagesController::class, 'viewTiles']);
        Route::post('/add-tiles', [ImagesController::class, 'addTiles'])->name('add-tiles');
        
        

    });

});
