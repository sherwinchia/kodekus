<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
  return [
    'slug' => $faker->name,
    'title' => $faker->sentence,
    'description' => $faker->text,
    'body' => '{"time":1600232431965,"blocks":[{"type":"paragraph","data":{"text":"aaa"}},{"type":"embed","data":{"service":"youtube","source":"https:\/\/www.youtube.com\/watch?v=kaP8mYmI2B4&amp;ab_channel=EHPMusicChannel","embed":"https:\/\/www.youtube.com\/embed\/kaP8mYmI2B4?","width":580,"height":320,"caption":""}},{"type":"paragraph","data":{"text":"Hello"}}],"version":"2.18.0"}',
    'category_id' => 1,
    'author_id' => 1
  ];
});
