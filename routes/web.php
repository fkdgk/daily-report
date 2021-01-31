<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/* 
 * /home をTOPへリダイレクト
 */
Route::get('/home', function () {
    return redirect() -> route('home');
});

Auth::routes([
    'login' => true, // メール確認機能（※5.7系以上のみ）
    'verify' => false, // メール確認機能（※5.7系以上のみ）
    'register' => false, // デフォルトの登録機能OFF
    'reset' => false, // メールリマインダー機能ON
]);

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
    ログインユーザのみ
*/ 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
});

