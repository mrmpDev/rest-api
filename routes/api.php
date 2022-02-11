<?php

use App\Http\Controllers\ArticleController;
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


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.list');
Route::post('/articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::put('/article/{articleId}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/{articleId}', [ArticleController::class, 'remove'])->name('article.remove');


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('/user/{userId}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{userId}', [UserController::class, 'remove'])->name('user.remove');
