<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;


Route::get('/', function () {

    return view('welcome', [
        'posts' => Post::latest()->get()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'posts' => Post::latest()->get(),
        'categories' => Category::latest()->get(),
        'comments' => Comment::latest()->get()
    ]);
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

// Resources
Route::resource('posts', PostController::class);
Route::resource('posts.comments', CommentController::class)->shallow();
Route::resource('categories', PostController::class);



Route::get('/contact-us',function(){
    return view('contact-us');
})->name('contactus');

Route::post('/contact-us',function(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'content'=>'required',
        'mobile'=>'required'
    ]);
    Message::create($request->all()) ;
    return redirect()->route('contactus')
        ->with('success', 'Message created successfully.');
})->name('contactus.post');

Route::get('/inbox',function(){
    return view('inbox',['messages' => Message::latest()->get()]) ;
})->middleware(['auth'])->name('inbox');

Route::get('/about-us',function(){
    return view('about-us');
})->name('aboutus');

Route::get('/statistics',function(){

    return view('statistics', ['posts'=>
        Post::latest()->get()
        ]);
})->middleware(['auth'])->name('statistics');
require __DIR__.'/auth.php';
