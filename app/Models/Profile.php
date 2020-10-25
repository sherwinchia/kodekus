<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
    'user_id',
    'image',
    'slug',
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

  public function getImageLinkAttribute()
  {
    if ($this->image) {
      return asset('storage/' . $this->image);
    } else {
      return asset('images/placeholder/placeholder.png');
    }
  }
}
