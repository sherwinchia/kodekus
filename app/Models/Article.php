<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
  use LogsActivity;

  protected static $logName = 'Article';
  
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

  public function author()
  {
    return $this->belongsTo('App\Models\User', 'author_id');
  }

  public function getDescriptionForEvent(string $eventName): string
  {
      return $this->title . " has been {$eventName}";
  }
}
