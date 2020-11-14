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
          'link' => '',
          'color' => '#3b5998',
          'icon' => 'fab fa-facebook',
          'display' => false
        ],
        [
          'name' => 'Youtube',
          'link' => '',
          'color' => '#c4302b',
          'icon' => 'fab fa-youtube',
          'display' => false
        ],
        [
          'name' => 'Discord',
          'link' => '',
          'color' => '#7289da',
          'icon' => 'fab fa-discord',
          'display' => false
        ],
        [
          'name' => 'Twitter',
          'link' => '',
          'color' => '#1DA1F2',
          'icon' => 'fab fa-twitter',
          'display' => false
        ]
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

      Page::create([
        'name' => 'About',
        'content' => 's:685:"<p>Hallo 👋, selamat datang di Kodingina.</p><p>Nama saya Sherwin dan saya adalah mahasiswa semester lima jurusan software engineering. Tujuan utama saya membuat website ini adalah sebagai catatan untuk pembelajaran saya. Selain itu, saya juga ingin berbagi catatan pembelajaran saya dengan teman-teman semua. Siapa tahu dapat membantu teman-teman dalam proses belajar pemrogramannya.</p><p>Untuk sementara ini saya adalah satu-satunya penulis di blog ini. Bagi teman-teman yang tertarik untuk bergabung bersama dengan saya untuk menulis dan berbagi pengalaman di blog ini boleh contact saya di sherwin.variancia@koding.com</p><p>Terima Kasih.</p><p>Sherwin Variancia 👨‍💻</p>";'
      ]);

      $meta = [
        [
          'name' => 'Title',
          'content' => null
        ],
        [
          'name' => 'Description',
          'content' => null
        ],
        [
          'name' => 'Twitter Site',
          'content' => null
        ],

      ];  
  
      Page::create([
        'name' => 'Meta',
        'content' => serialize($meta)
      ]);
    }
}
