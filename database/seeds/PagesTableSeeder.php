<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Page::truncate();

      $socials = [
 
      ];

      Page::create([
        'name' => 'Social',
        'content' => serialize($socials)
      ]);

      $comments = [
        'comment_approval' => false,
      ];


      Page::create([
        'name' => 'Comment',
        'content' => serialize($comments)
      ]);
    }
}
