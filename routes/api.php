<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([], function () {
    Route::post('/login', [Authcontroller::class, 'login'])->name('login');
    Route::post('/logout', [Authcontroller::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::get('/user-me', [Authcontroller::class, 'user'])->middleware('auth:api')->name('current.user');
});

Route::group(['prefix' => 'users'], function () {
//    Route::get('/', [UserController::class, 'index'])->middleware('auth:api')->name('users');
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::put('/{userId}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{userId}', [UserController::class, 'remove'])->name('user.remove');
});
Route::group(['prefix' => 'articles'], function () {

    Route::get('/', [ArticleController::class, 'index'])->name('articles.list');
    Route::post('/', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::put('/{articleId}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/{articleId}', [ArticleController::class, 'remove'])->name('article.remove');

});
