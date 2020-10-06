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
}