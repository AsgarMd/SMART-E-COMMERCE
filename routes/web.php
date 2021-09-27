<?php

use App\Http\Controllers\home_cntr;
use App\Http\Controllers\admin_cntr;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 route::get('/redirect',[home_cntr::class,'redirect']);
 route::get('/',[home_cntr::class,'index']);
 route::get('/product',[admin_cntr::class,'product']);
 route::post('/uploadproduct',[admin_cntr::class,'uploadproduct']);
 route::get('/showproduct',[admin_cntr::class,'showproduct']);
 route::get('/deleteproduct/{id}',[admin_cntr::class,'deleteproduct']);
 route::get('/updateproduct/{id}',[admin_cntr::class,'updateproduct']);
 route::post('/updated/{id}',[admin_cntr::class,'updated']);
 route::get('/search',[home_cntr::class,'search']);
 route::post('/addcart/{id}',[home_cntr::class,'addcart']);
 route::get('/showcart',[home_cntr::class,'showcart']);
 route::get('/delete/{id}',[home_cntr::class,'deletecart']);
 route::post('/order',[home_cntr::class,'confirmorder']);
 route::get('/showorder',[admin_cntr::class,'showorder']);
 route::get('/updatestatus/{id}',[admin_cntr::class,'updatestatus']);
 route::get('/product',[home_cntr::class,'product']);
 route::get('/home',[home_cntr::class,'home']);
 route::get('/about',[home_cntr::class,'about']);
 route::get('/contact',[home_cntr::class,'contact']);