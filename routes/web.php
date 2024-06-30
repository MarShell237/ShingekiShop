<?php

use App\Http\Controllers\FactureController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PanierController;
use App\Models\Categorie;
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
Route::get('/inscription',function (){
    return view('inscription');})->name('inscription');

Route::view('/notAuthorize','admin.notAuthorize')->name('notAuthorize');

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::resource('/product',ProductController::class)->except(['show']);
    Route::resource('/article',ArticleController::class)->except(['show']);
});
Route::get('/panier',[PanierController::class,'index'])->name('panier.index')->middleware('auth');
Route::post('/panier/store/{product}',[PanierController::class,'store'])->name('panier.store')->middleware('auth');
Route::delete('/help/destroy/{id}',[HelpController::class,'destroy'])->name('help.destroy')->middleware('auth');
Route::get('/panier/destroy/{product}',[PanierController::class,'destroy'])->name('panier.destroy')->middleware('auth');
Route::get('/panier/destroyAll',[PanierController::class,'destroyAll'])->name('panier.destroyAll')->middleware('auth');

Route::get('/facture/{id}',[FactureController::class,'store'])->name('facture.store')->middleware('auth');
Route::put('/buy',[HelpController::class,'buy'])->name('buy')->middleware('auth');
Route::get('/buy/om',[HelpController::class,'om'])->name('buy.om')->middleware('auth');
Route::get('/buy/momo',[HelpController::class,'momo'])->name('buy.momo')->middleware('auth');


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'doLogin']);
Route::delete('/login',[AuthController::class,'logout'])->name('login');

Route::get('/', [HomeProduitController::class,'home'])->name('myhome.product');

Route::prefix('/client')->name('client.')->group(function(){
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


    Route::post('/create_user',[UserController::class,'store'])->name('create_user');
    Route::get('/create_user',[UserController::class,'create'])->name('create_user');
});

