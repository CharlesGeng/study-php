<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

    // dd($files);
    return view('posts', [
        'posts' => Post::with("category", 'author')->get()
    ]);
});

Route::get('posts/{id}', function ($id) {

    return view('post', [
        'post' => Post::find($id)
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    // dd($category->posts);
    return view('posts', [
        'posts' => $category->posts->load('category', 'author')
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
