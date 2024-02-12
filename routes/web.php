<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome-page.home',[
        'categories' => Category::all()
    ]);
});

Route::get('/shop', function () {
    return view('main-page.index',[
        'items' => Item::all()
    ]);
});


Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/product', [DashboardController::class,'myItem'])->name('my.item');
Route::get('/product/add', [DashboardController::class, 'addItem'])->name('add.item');
Route::get('/product/{item:slug}/edit', [DashboardController::class, 'editItem'])->name('edit.item');
Route::post('/product/add', [DashboardController::class, 'storeItem'])->name('store.item');
Route::delete('/product/{item:id}/delete', [DashboardController::class, 'destroyItem'])->name('destroy.item');

Route::post('/register', [UserController::class,'register'])->name('register.submit');
Route::post('/login', [UserController::class,'login'])->name('login.submit');

Route::get('/{item:slug}',[ShopController::class,'item'])->name('item');


