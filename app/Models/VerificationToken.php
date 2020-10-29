<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
  protected $fillable = [
    'user_id', 'token', 'type', 'expire_at', 'validated_at'
  ];

  public function user(){
		return $this->belongsTo('App\Models\User');
  }

  public function getActivationLinkAttribute()
  {
    return route('browser.auth.activation', $this->token);
  }

  public function getForgotPasswordLinkAttribute()
  {
    return route('browser.auth.reset.show', $this->token);
  }
}
