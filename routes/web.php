<?php

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
    return redirect('/landing-page');
});
Route::get('/landing-page', function () {
    return view('welcome-page.home',[
        'categories' => Category::all()
    ]);
});

Route::get('/shop', function () {
    return view('main-page.index',[
        'items' => Item::all()
    ]);
});

Route::post('/register', [UserController::class,'register'])->name('register.submit');
Route::post('/login', [UserController::class,'login'])->name('login.submit');
Route::get('/home', [UserController::class,'index'])->name('test');
