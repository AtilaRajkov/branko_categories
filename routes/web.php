<?php

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
    return view('welcome');
});


Route::get('/posts/{id}', function ($id)
{
    $post = App\Post::with([
        'comments',
        'parentComments.owner',
        'parentComments.allRepliesWithOwner'
    ]);

    return view('post.single')->withPost(
        $post->findOrFail($id)
    );
});

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');

