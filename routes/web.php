<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

//we can use getpathname to get the full path of the file 
//we can also use the string to get the path name 
//getContents is a method that returns the content of the file
// ddd($posts);
Route::get('/', function () {
    return view(
        'posts',
        [
            'posts' => Post::all()

        ]
    );
});


Route::get('posts/{post}', function ($slug) {
    $post = Post::findOrFail($slug);
    // find a post by its slug and pass it to a view called "post"
    return view('post', [
        // this is Post model and we are calling the find method on it and passing the slug
        'post' =>  Post::find($slug)

    ]);
    // return ($slug);


});
