<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// 利用者用
    // ホーム画面へ遷移
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // 全商品一覧画面を表示
    Route::get('home/all_item', [App\Http\Controllers\HomeController::class, 'all_item'])->name('home.all_item');
    // グッズ一覧画面を表示
    Route::get('home/goods_list', [App\Http\Controllers\HomeController::class, 'goods_list'])->name('home.goods_list');
    // 男の子商品一覧画面を表示
    Route::get('home/boys_list', [App\Http\Controllers\HomeController::class, 'boys_list'])->name('home.boys_list');
    // 女の子商品一覧画面を表示
    Route::get('home/girls_list', [App\Http\Controllers\HomeController::class, 'girls_list'])->name('home.girls_list');
    // 詳細画面を表示
    Route::get('home/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');
    // Route::get('home/search',[\App\Http\Controllers\HomeController::class,'search'])->name('home.search');



// 商品管理用
Route::prefix('item')->group(function () {
    // 管理用商品一覧画面を表示
    Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    // 管理用商品登録画面を表示
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');
    // 商品登録
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // 商品編集画面を表示
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name("item.edit");
    // 商品を更新
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name("item.update");
    // 商品削除
    Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete'])->name("item.delete");;
    // Route::get('/search', [App\Http\Controllers\ItemController::class, 'search'])->name("item.search");;
    
});

// ユーザー関連用
Route::prefix('user')->group(function () {
    // ユーザー一覧画面を表示
    Route::get('/user_list', [App\Http\Controllers\UserController::class, 'user_list'])->name('user.user_list');
    // ユーザー編集画面を表示
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    // ユーザー更新
    Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    // ユーザー削除
    Route::post('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

});


    