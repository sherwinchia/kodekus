<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name',
    'slug'
  ];

  public function article()
  {
    return $this->hasMany('App\Models\Article');
  }
}
