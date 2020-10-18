<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tag extends Model
{
  use LogsActivity;

  protected static $logName = 'Tag';

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
    return $this->belongsToMany('App\Models\Article');
  }

  public function getTagLinkAttribute()
  {
    return route('browser.search.index',['tag'=>$this->id]);
  }
}
