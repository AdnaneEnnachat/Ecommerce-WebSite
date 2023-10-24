<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\supportProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

Route::fallback(function() {
    return view('404');
});

Route::get('/panier',function (){
    return view('panier');
});
Route::post('search',function (Request $req){
    return redirect(url('/boutique/categorie/'.$req->categorie))->with('product',$req->product);
});
Route::get('generate/pdf/{numero}',[supportProductController::class,'generatePDF'])->name('PDF');
Route::get('/boutique/categorie/{cat}',[supportProductController::class,'categoryProduct']);
Route::get('/boutique/{slug}',[supportProductController::class,'SingleProduct']);
Route::get('/boutique/',function (){
    return redirect(url('index'));
});
Route::get('/facture', function () {
    return view('facture.facture');
});

Route::get('/',[ProductController::class,'Send_data']);
Route::get('/index',[ProductController::class,'Send_data']);
Route::post('/addProductToCart',[ProductController::class,'add_to_panier']);
Route::get('/check', function () {
    return view('checkout');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile',function (){
        return view('profile.profile');
    });
    Route::get('/orders',[supportProductController::class,'ordersForUser']);
    Route::get('/canceled-orders',[supportProductController::class,'cancledOrdersForUser']);
    Route::post('/panier/save',[OrderController::class,'makeOrder']);

    Route::get('/profile-information',function (){
        return view('profile.partials.profile-information');
    });
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



//ADMIN
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');


Route::middleware(['checkAdminRole','admin'])->group(function () {
    Route::get('/admin/register',[RegisteredAdminController::class,'create']);
    Route::post('/admin/register',[RegisteredAdminController::class,'store'])->name('register_Admin');
    Route::delete('/admin/delete/{id}',[HomeController::class,'deleteAdmin']);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/produit',[HomeController::class,'getCategory'])->name('Add_product');
    Route::get('/admin/dash', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders',[OrderController::class,'OrdersAdmin']);
    Route::put('/admin/orders/show/{order}',[OrderController::class,'singleOrder']);
    Route::post('admin/order/update',[OrderController::class,'StatusUpdate']);
    Route::post('admin/orders',[OrderController::class,'OrdersAdmin']);

    //GERER CATEGORIES

Route::controller(CategorieController::class)->group(function (){
    Route::get('/admin/category','index');
    Route::post('/admin/add_category','save');
    Route::delete('/admin/category/delete/{name}','delete');
    Route::put('/admin/category/edit/{name}','edit');
    Route::post('/admin/category/update','update');
});


    //GERER PRODUCTS
    Route::controller(ProductController::class)->group(function (){
        Route::post('/admin/poduct/add','addProduit');
        Route::get('/admin/getProduct','getProduct');
        Route::DELETE('/admin/product/delete/{id}','delete');
        Route::put('/admin/product/edit/{id}','edit');
        Route::post('/admin/product/update','update');
    });



    //LOGOUT ADMIN
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

});
