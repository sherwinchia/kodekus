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
        [
          'name' => 'Facebook',
          'link' => null,
          'color' => '#3b5998',
          'icon' => 'fab fa-facebook'
        ],
        [
          'name' => 'Twitter',
          'link' => null,
          'color' => '#00acee',
          'icon' => 'fab fa-twitter'
        ],
        [
          'name' => 'Instagram',
          'link' => null,
          'color' => null,
          'icon' => 'fab fa-instagram'
        ],
        [
          'name' => 'Discord',
          'link' => null,
          'color' => '#7289DA',
          'icon' => 'fab fa-discord'
        ],
        [
          'name' => 'Youtube',
          'link' => null,
          'color' => '#FF0000',
          'icon' => 'fab fa-youtube'
        ],
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
