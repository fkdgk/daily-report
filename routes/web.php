<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;

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


/*
ログイン、アクティブユーザのみ
*/ 
Route::group(['middleware' => ['auth','can:active']], function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');

    /* 
     * users ---------------------------------------
     */
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    
    /* 
     * divisions ---------------------------------------
     */
    Route::get('/divisions', [DivisionController::class, 'index'])->name('division.index');
    Route::post('/divisions', [DivisionController::class, 'store'])->name('division.store');
    Route::put('/divisions', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('/divisions', [DivisionController::class, 'destroy'])->name('division.destroy');
    
    /* 
     * projects ---------------------------------------
     */
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/projects', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects', [ProjectController::class, 'destroy'])->name('project.destroy');

    /*
    * posts ---------------------------------------
    */
    Route::get('/posts/user/{user}', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::post('/posts/{post}/copy', [PostController::class, 'copy'])->name('post.copy');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    /*
    * comments ---------------------------------------
    */
    Route::post('/posts/{post}', [CommentController::class, 'store'])->name('comment.store');
    
});

