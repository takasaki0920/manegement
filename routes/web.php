<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// ホーム画面へ遷移

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/all_item', [App\Http\Controllers\HomeController::class, 'all_item'])->name('home.all_item');
Route::get('home/goods_list', [App\Http\Controllers\HomeController::class, 'goods_list'])->name('home.goods_list');
Route::get('home/boys_list', [App\Http\Controllers\HomeController::class, 'boys_list'])->name('home.boys_list');
Route::get('home/girls_list', [App\Http\Controllers\HomeController::class, 'girls_list'])->name('home.girls_list');
Route::get('home/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');
Route::get('home/search',[\App\Http\Controllers\HomeController::class,'search'])->name('home.search');


// 管理者 = アイテム管理
Route::prefix('item')->group(function () {
    // item/index
    Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    // item/add
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name("item.edit");
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);
});


Route::prefix('user')->group(function () {
    Route::get('/user_list', [App\Http\Controllers\UserController::class, 'user_list'])->name('user.user_list');
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

});


    