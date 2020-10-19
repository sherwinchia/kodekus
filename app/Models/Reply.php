<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $fillable = [
    'comment_id',
    'user_id',
    'name',
    'email',
    'content',
    'approved',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function comment()
  {
    return $this->belongsTo('App\Models\Comment', 'comment_id');
  }
}
