<?php

use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        Tag::create([
          'name' => 'Laravel',
          'slug' => 'laravel'
        ]);
  
        Tag::create([
          'name' => 'Javascript',
          'slug' => 'javascript'
        ]);
  
        Tag::create([
          'name' => 'Python',
          'slug' => 'python'
        ]);
    }
}
