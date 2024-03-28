<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function  __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function all()
    {
        // find all the files in the posts directory and collect them into a collection and loop or map over them and for each one parse that file to a document
        // and then map over the second collection and create a new post instance for each one
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                ->sortByDesc('date');
        });
    }
    // we have made a new method called find that will find a post by its slug
    public static function find($slug)
    {
        //  we make a path to the file
        // check if the file exists
        // resource path is a helper function that returns the path to the resources directory if you ctrl+click on it you will see the function
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        // if the file does not exist we throw a model not found exception 
        // throw new ModelNotFoundException();
        // }
        // return  cache()->remember(
        //     "posts.{$slug}",
        //     1200,
        //get the content of the file
        //fn is a shorthand for function
        // fn () => file_get_contents($path)
        // var_dump('file_get_content');
        // );

        // of all the blog posts, find the one with a slug that matches the one that was requested
        // static::all() is a collection of all the blog posts
        // $posts = static::all();
        return static::all()->firstWhere('slug', $slug);
    }
    // we have made a new method called findOrFail that will throw a model not found exception if the post does not exist
    // we use the findOrFail method in the web.php file 
    // so if the post does not exist it will throw a model not found exception and if exists it will return the post
    public static function findOrFail($slug)
    {
        $post =  static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
