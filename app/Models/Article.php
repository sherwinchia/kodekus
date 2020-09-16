<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title', 
      'description', 
      'body', 
      'slug', 
      'image', 
      'category', 
      'tag', 
      'publish_date', 
      'published', 
      'featured', 
      'trending'
    ];

    public function tags()
    {
      return $this->hasMany('App\Models\Tag');
    }
}
