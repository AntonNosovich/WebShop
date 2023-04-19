<?php

use App\Admin\Http\Controllers\ProductsController;
use App\Http\Controllers\Frontend\Auth\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['user','web'])->group(function(){
//Route::group(['middleware'=>['auth','user']],function(){

    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::get('/logout',[AuthController::class,'postLogout'])->name('postLogout');

});
Route::middleware(['guest','web'])->group(function() {


    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
});

Route::get('/main',[ProductsController::class,'frontendIndex'])->name('main');

Route::get('/main/{client_menu}',[ProductsController::class,'productCategory'])->name('productCategory');
