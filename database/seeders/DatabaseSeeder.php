<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Category::truncate();
        Post::truncate();



        $user =   User::factory()->create();

        $personal =  Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $family =  Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'My first post excerpt',
            'body' => 'loreum ipsum dolor sit amet consectetur adipisicing elit. Tempore, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod',
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'My first post excerpt',
            'body' => 'loreum ipsum dolor sit amet consectetur adipisicing elit. Tempore, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod, quos voluptates quidem, quas, quae quia quibusdam quod',
        ]);
    }
}
