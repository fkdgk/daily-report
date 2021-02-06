<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkController;

/* 
 * /home をTOPへリダイレクト
 */
Route::get('/home', function () {
    return redirect() -> route('home');
});

Auth::routes([
    'login' => true, // メール確認機能（※5.7系以上のみ）
    'verify' => false, // メール確認機能（※5.7系以上のみ）
    'register' => true, // デフォルトの登録機能OFF
    'reset' => false, // メールリマインダー機能ON
]);

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
    ログイン、アクティブユーザのみ
*/ 
Route::group(['middleware' => ['auth','can:active']], function () {
    /* 
     * users ---------------------------------------
     */
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    
    /* 
     * divisions ---------------------------------------
     */
    Route::get('/divisions', [DivisionController::class, 'index'])->name('division.index');
    
    /* 
     * projects ---------------------------------------
     */
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');

    /*
    * posts ---------------------------------------
    */
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/user/{id}', [PostController::class, 'user'])->name('post.user');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    
});

