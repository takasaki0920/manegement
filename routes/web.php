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
Route::get('home/all_item', [App\Http\Controllers\HomeController::class, 'all_item']);



// 管理者 = アイテム管理
Route::prefix('items')->group(function () {
    // items
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    // items/add
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});


Route::prefix('user')->group(function () {
    Route::get('/user_list', [App\Http\Controllers\UserController::class, 'user_list'])->name('user_list');
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    
});


    