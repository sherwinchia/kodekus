<?php

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
        // $this->call(ArticlesTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
        $this->call(GuardsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(QuizzesSeeder::class);
    }
}
