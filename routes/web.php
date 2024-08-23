<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Support\SupportLoginController;
use App\Http\Controllers\Support\SupportRegisterController;
use App\Http\Controllers\SupportingController;

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
    return view('start');
});



Route::middleware('auth')->group(function () {
    Route::middleware('supported')->group(function () {
        Route::get('/supporting', [SupportingController::class, 
        'index'])->name('supporting.index');
    });
    Route::middleware('supporting')->group(function () {
        Route::get('/home', function () {
            return view('home');
        })->name('home');

        
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

        Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
    });
});

Route::group(['prefix' => 'support'], function () {
    Route::middleware('guest:support')->group(function () {
    // 登録
    Route::get('register', [SupportRegisterController::class, 'create'])
        ->name('support.register');

    Route::post('register', [SupportRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [SupportLoginController::class, 'create'])
        ->name('support.login');

    Route::post('login', [SupportLoginController::class, 'store']);

    });

    Route::post('logout', [SupportLoginController::class, 'destroy'])
                ->name('support.logout');

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:support'])->group(function () {
        // ダッシュボード
        Route::get('home', fn() => view('support.home'))
            ->name('support.home');

        Route::get('approve', [PostController::class, 'approveIndex'])->name('support.approve.index');
        Route::post('approve', [PostController::class, 'approve'])->name('support.approve');

        Route::get('supporting', [PostController::class, 'supporting'])->name('supporting');
        Route::post('supported', [PostController::class, 'supported'])->name('supported');
    });
});

require __DIR__.'/auth.php';

