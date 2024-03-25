<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        // $files =  
        File::files(resource_path("posts/"));

        // array_map is sort of like a loop but it return a new array
        // if we loop over each of the file the second item is  the thing that we are looping over
        // array_map(fn ($file) => $file->getContents(), $files);
        // return 'fooooo';
    }
    public static function find($slug)
    {
        //  we make a path to the file
        // check if the file exists
        // resource path is a helper function that returns the path to the resources directory if you ctrl+click on it you will see the function
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            // if the file does not exist we throw a model not found exception 
            throw new ModelNotFoundException();
        }
        return  cache()->remember(
            "posts.{$slug}",
            1200,
            //get the content of the file
            //fn is a shorthand for function
            fn () => file_get_contents($path)
            // var_dump('file_get_content');
        );
    }
}
