<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\PostController;

use  App\Http\Controllers\PagesController;

use  App\Http\Controllers\HomeController;


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

/*Rotas dos Index*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/teste', function () {
    return view('alternative');
});

Route::get('/index-backup', [HomeController::class, 'index2'])->name('index2');

/*Rotas dos Posts*/
Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/posts/id/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{slug}', [PostController::class, 'slug'])->name('posts.slug');

Route::get('/categories/{slug}', [PostController::class, 'slugCategory'])->name('categories.slug');

Route::get('/author/{id}', [PostController::class, 'authorIndex'])->name('author');
/*--------------*/

/*Rotas das Pages*/
Route::get('/pages', [PagesController::class, 'index'])->name('pages');

Route::get('/pages/id/{id}', [PagesController::class, 'show'])->name('pages.id');

Route::get('/pages/{slug}', [PagesController::class, 'slug'])->name('pages.slug');

Route::get('/autor/{id}', [PagesController::class, 'authorIndex'])->name('pages.autor');
/*--------------*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
