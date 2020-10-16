<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::truncate();

      Category::create([
        'name' => 'Website',
        'slug' => 'website'
      ]);

      Category::create([
        'name' => 'Cryptocurrency',
        'slug' => 'cryptocurrency'
      ]);

      Category::create([
        'name' => 'Mobile Application',
        'slug' => 'mobile-app'
      ]);
    }
}
