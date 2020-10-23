<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
  protected $fillable = [
    'user_id',
    'name',
    'email',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
}
