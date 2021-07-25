<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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


// Showing 10 new done

Route::get('/', fn() => view('welcome',[
    'posts' => Post::latest()->get()
]));



Route::get('/dashboard', fn() => view('dashboard',[
    'posts' => Post::latest()->get(),
    'categories' => Category::latest()->get(),
    'comments'=> Comment::latest()->get()
]))->middleware(['auth'])->name('dashboard');



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

// Resources
Route::resource('posts', PostController::class);
Route::resource('posts.comments', CommentController::class)->shallow();
Route::resource('categories', PostController::class);


require __DIR__.'/auth.php';
