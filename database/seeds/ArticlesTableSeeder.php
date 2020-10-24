<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Article::truncate();
      
      Article::create([
        'slug' => 'dummy-1',
        'title' => 'This is dummy one',
        'description' => 'This id dummy one description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 1,
        'author_id' => 1,
        'publish_date' => '2020-10-15T20:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);

      Article::create([
        'slug' => 'dummy-2',
        'title' => 'This is dummy two',
        'description' => 'This id dummy two description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 1,
        'author_id' => 1,
        'publish_date' => '2020-10-14T21:00',
        'published' => 1,
        'read_minutes' => '3 minutes'
      ]);

      Article::create([
        'slug' => 'dummy-3',
        'title' => 'This is dummy three',
        'description' => 'This id dummy three description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 1,
        'author_id' => 1,
        'publish_date' => '2020-10-13T21:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);

      Article::create([
        'slug' => 'dummy-4',
        'title' => 'This is dummy four',
        'description' => 'This id dummy four description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-15T21:00',
        'published' => 1,
        'read_minutes' => '5 minutes'
      ]);
      
      Article::create([
        'slug' => 'dummy-5',
        'title' => 'This is dummy five',
        'description' => 'This id dummy five description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-15T23:00',
        'published' => 1,
        'read_minutes' => '2 minutes'
      ]);
      Article::create([
        'slug' => 'dummy-6',
        'title' => 'This is dummy six',
        'description' => 'This id dummy six description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-09-15T23:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);
      Article::create([
        'slug' => 'dummy-7',
        'title' => 'This is dummy seven',
        'description' => 'This id dummy seven description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-13T23:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);
      Article::create([
        'slug' => 'dummy-8',
        'title' => 'This is dummy eight',
        'description' => 'This id dummy eight description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-05T23:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);
      Article::create([
        'slug' => 'dummy-9',
        'title' => 'This is dummy nine',
        'description' => 'This id dummy nine description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-15T23:30',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);
      Article::create([
        'slug' => 'dummy-10',
        'title' => 'This is dummy ten',
        'description' => 'This id dummy ten description for testing purpose only',
        'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
        'category_id' => 2,
        'author_id' => 1,
        'publish_date' => '2020-10-15T16:00',
        'published' => 1,
        'read_minutes' => '1 minute'
      ]);

      // factory(Article::class,50)->create();
    }
}
