<?php

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardCartController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\SettingsIncomeController;
use App\Http\Controllers\SettingsAccountController;
use App\Http\Controllers\DashboardHistoryController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\AdminNotificationController;

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

Route::get('/', function () {
    return view('welcome-page.home',[
        'categories' => Category::all()
    ]);
})->name('landing-page');

Route::get('/shop', function () {
    return view('main-page.index',[
        'items' => Item::all()
    ]);
})->name('shop');

Route::post('/register', [UserController::class,'register'])->name('register.submit');
Route::post('/login', [UserController::class,'login'])->name('login.submit');
Route::post('/logout', [UserController::class,'logout'])->name('logout');

//User Permissions
Route::middleware(['auth'])->group(function () {
    //Dashboard Page
    //Product
    Route::get('/product', [DashboardProductController::class, 'myItem'])->name('my.item');
    Route::get('/product/add', [DashboardProductController::class, 'addItem'])->name('add.item');
    Route::post('/product', [DashboardProductController::class, 'storeItem'])->name('store.item');
    Route::get('/product/{item:slug}/edit', [DashboardProductController::class, 'editItem'])->name('edit.item');
    Route::post('/{item:slug}', [ShopController::class, 'buy'])->name('buy.item');
    Route::delete('/product/{item:id}', [DashboardProductController::class, 'destroyItem'])->name('destroy.item');
    Route::put('/product/{item:id}', [DashboardProductController::class, 'updateItem'])->name('update.item');
    //Cart
    Route::get('/cart', [DashboardCartController::class, 'index'])->name('my.cart');
    Route::post('/{item:slug}/test', [DashboardCartController::class, 'store'])->name('store.cart');
    //History
    Route::get('/history', [DashboardHistoryController::class, 'index'])->name('my.history');
    //Home
    Route::get('/home', [DashboardHomeController::class, 'index'])->name('my.home');
    Route::put('/home/{order:id}/confirm', [DashboardHomeController::class, 'confirm'])->name('order.confirm');
    //Settings Page
    //Account
    Route::get('/account', [SettingsAccountController::class, 'index'])->name('my.account');
    //Income
    Route::get('/income', [SettingsIncomeController::class, 'index'])->name('my.income');
});
//Admin Permissions
//User Settings
//Account
Route::get('/admin/account', [AdminAccountController::class, 'index'])->name('admin.account');
//Notifications
Route::get('/admin/notification', [AdminNotificationController::class, 'index'])->name('admin.notifications');

//Item Settings
//Product
Route::get('/admin/product', [AdminProductController::class, 'index'])->name('admin.product');
//Category
Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category');


Route::get('/{item:slug}',[ShopController::class,'item'])->name('item');


