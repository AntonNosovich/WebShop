<?php

use App\Admin\Http\Controllers\AdvertisingController;
use App\Admin\Http\Controllers\ClientMenuController;
use App\Admin\Http\Controllers\ItemsController;
use App\Admin\Http\Controllers\MenuController;
use App\Admin\Http\Controllers\ProductsController;
use App\Admin\Http\Controllers\RolesController;
use App\Admin\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['user','manager'])->group(function() {

      Route::resource('users', UserController::class);
      Route::resource('roles',RolesController::class);
      Route::get('/logout',[UserController::class,'postLogout'])->name('AdminpostLogout');
      Route::get('sort/{role}',[UserController::class,'sortByRole'])->name('sort');
      Route::resource('menus', MenuController::class);
      Route::resource('client-menu', ClientMenuController::class)->except(['show']);
      Route::resource('item', ItemsController::class)->except(['index']);;
      Route::resource('product', ProductsController::class);
      Route::resource('advertising', AdvertisingController::class);
      Route::post('/dynamic_adveresting',[AdvertisingController::class,'fetch'])->name('dynamicItem.fetch');
});

