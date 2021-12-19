<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\User',10)->create();

        // User::factory()->count(10)->create();

        User::factory()->count(10)->has(Post::factory()->count(2))->create();

    }
}
