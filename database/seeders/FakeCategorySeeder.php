<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class FakeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(100)->create();
    }
}
