<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $frontend = Category::factory()->create(['name' => 'frontend', 'slug'=>'frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug'=>'backend']);

        Blog::factory(2)->create(['category_id' => $frontend->id]);
        Blog::factory(2)->create(['category_id' => $backend->id]);

        User::factory(2)->create();
        User::factory(2)->create();
    }
}
