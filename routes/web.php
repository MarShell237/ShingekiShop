<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\HomeProduitController;
use App\Http\Controllers\HomeArticleController;  
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
Route::get('/inscription',[AuthController::class,'login'])->name('inscription');

Route::view('/notAuthorize','admin.notAuthorize')->name('notAuthorize');

Route::prefix('/admin')->name('admin.')->middleware('auth:admin')->group(function (){
    Route::resource('/product',ProductController::class)->except(['show']);
    Route::resource('/article',ArticleController::class)->except(['show']);
});
Route::get('/adminLogin',[AdminController::class,'login'])->name('adminLogin')->middleware('guest:admin');
Route::post('/adminLogin',[AdminController::class,'doLogin'])->name('adminLogin')->middleware('guest:admin');
Route::delete('/adminLogin',[AdminController::class,'logout'])->name('adminLogin')->middleware('auth:admin');

Route::prefix('/panier')->name('panier.')->middleware('auth:web')->group(function(){
  Route::get('/',[PanierController::class,'index'])->name('index');
  Route::post('/store/{product}',[PanierController::class,'store'])->name('store');
  Route::post('/storeShow/{product}',[PanierController::class,'storeShow'])->name('storeShow');
  Route::delete('/destroy/{panier}',[PanierController::class,'destroy'])->name('destroy');
  Route::get('/destroy/{product}',[PanierController::class,'destroy'])->name('destroy');
  Route::put('/update/{panier}',[PanierController::class,'update'])->name('update');
  Route::get('/destroyAll',[PanierController::class,'destroyAll'])->name('destroyAll');
  Route::put('/buy',[HelpController::class,'buy'])->name('buy');
  Route::get('/buy/om',[HelpController::class,'om'])->name('buy.om');
  Route::get('/buy/momo',[HelpController::class,'momo'])->name('buy.momo');
});

Route::get('/facture/{id}',[FactureController::class,'store'])->name('facture.store')->middleware('auth:web');


Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest:web');
Route::post('/login',[AuthController::class,'doLogin'])->middleware('guest:web');
Route::delete('/login',[AuthController::class,'logout'])->name('login')->middleware('auth:web');

Route::get('/', [HomeProduitController::class,'home'])->name('myhome.product');

Route::prefix('/client')->name('client.')->middleware('auth:web')->group(function(){
    Route::get('/product', [HomeProduitController::class,'index'])->name('product.index');
    Route::get('/product/{id}', [HomeProduitController::class,'filter'])->name('product.filter');
    Route::get('/product/{slug}/{product}', [HomeProduitController::class,'show'])->name('product.show')
    ->where([
        "slug"=>'[0-9a-z\-]+',
        "product"=>'[0-9]+',
    ]);

    
    Route::get('/article', [HomeArticleController::class,'index'])->name('article.index');
    // Route::get('/article/{id}', [HomeArticleController::class,'filter'])->name('article.filter');
    Route::get('/article/{article}', [HomeArticleController::class,'show'])->name('article.show');


  });
  Route::post('/create_user',[UserController::class,'store'])->name('create_user')->middleware(['guest']);

