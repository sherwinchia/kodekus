<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = [
    'likeable_id',
    'likeable_type',
    'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function likeable()
  {
    return $this->morphTo();
  }

}
