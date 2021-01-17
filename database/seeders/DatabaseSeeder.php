<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(15)->create();
        \App\Models\Like::factory(15)->create();
        \App\Models\Reply::factory(45)->create();
        \App\Models\ReplyReply::factory(15)->create();
        \App\Models\ReplyLike::factory(15)->create();

    }
}
