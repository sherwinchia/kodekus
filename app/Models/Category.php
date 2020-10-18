<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
  use LogsActivity;

  protected static $logName = 'Category';

  protected $fillable = [
    'name',
    'slug'
  ];

  public function getDescriptionForEvent(string $eventName): string
  {
      return $this->name . " has been {$eventName}";
  }

  public function articles()
  {
    return $this->hasMany('App\Models\Article');
  }

  public function getCategoryLinkAttribute()
  {
    return route('browser.search.index',['category'=>$this->id]);
  }
}
