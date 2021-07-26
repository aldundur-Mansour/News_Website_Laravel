<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
      // Post::factory(13)->create(['user_id'=>1]);
        Comment::factory(12)->create(['post_id'=>36]);
    //   Post::factory(10)->create(['category_id'=>1]) ;

    }
}
