<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'phone_number',
    'facebook_link',
    'twitter_link',
    'instagram_link',
    'youtube_link',
    'bio',
    'birthdate'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
}
