<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\PostController;

use  App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/*Rotas dos Posts*/
Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/id/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{slug}', [PostController::class, 'slug'])->name('posts.slug');

Route::get('/categories/{slug}', [PostController::class, 'slugCategory'])->name('categories.slug');
/*--------------*/

/*Rotas das Pages*/
Route::get('/pages', [PagesController::class, 'index'])->name('pages');

Route::get('/pages/id/{id}', [PagesController::class, 'show'])->name('pages.id');

Route::get('/pages/{slug}', [PagesController::class, 'slug'])->name('pages.slug');

/*--------------*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
