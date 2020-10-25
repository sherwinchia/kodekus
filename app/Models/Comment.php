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

  public function replies()
  {
    return $this->hasMany('App\Models\Reply');
  }

  public function commentable()
  {
    return $this->morphTo();
  }

  public function isApproved()
  {
    if ($this->approved) {
      return true;
    } else {
      return false;
    }
  }
}
