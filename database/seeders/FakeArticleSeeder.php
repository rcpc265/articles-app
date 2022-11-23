<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class FakeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(1000)->create();
    }
}
