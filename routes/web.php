<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts = Post::all();

    ddd($posts[1]->getPathname());

    return view(
        'posts',
        [
            'posts' => $posts
        ]
    );
});

Route::get('posts/{post}', function ($slug) {

    // find a post by its slug and pass it to a view called "post"
    return view('post', [
        // this is Post model and we are calling the find method on it and passing the slug
        'post' =>  Post::find($slug)

    ]);
    // return ($slug);


})->where('post', '[A-z_\-]+');
