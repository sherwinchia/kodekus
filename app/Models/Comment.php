<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'commentable_id',
    'commentable_type',
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

  public function commentable()
  {
    return $this->morphTo();
  }
}
