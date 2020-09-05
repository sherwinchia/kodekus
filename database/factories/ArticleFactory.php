<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
  return [
    'slug' => $faker->name,
    'title' => $faker->sentence,
    'subtitle' => $faker->catchPhrase,
    'content' => $faker->text,
    'author_id' => $faker->randomDigit
  ];
});
