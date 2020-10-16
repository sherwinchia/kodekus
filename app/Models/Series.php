<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Series extends Model
{
    use LogsActivity;

    protected static $logName = 'Series';
  
    protected $fillable = [
      'name',
    ];
  
    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " has been {$eventName}";
    }
  
    public function articles()
    {
      return $this->hasMany('App\Models\Article');
    }
}
