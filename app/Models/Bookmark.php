<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
  protected $fillable = [
    'bookmarkable_id', 
    'bookmarkable_type', 
    'user_id'
  ];

  public function bookmarkable()
  {
    return $this->morphTo();
  }
}
