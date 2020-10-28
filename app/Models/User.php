<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity;

    protected static $logName = 'User';

    const ADMIN_ROLE = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password', 
        'role', 
        'facebook_id', 
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function articles()
    {
      return $this->hasMany('App\Models\Article', 'author_id');
    }

    public function bookmarks()
    {
      return $this->hasMany('App\Models\Bookmark');
    }

    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function newsletter()
    {
      return $this->hasOne('App\Models\Newsletter');
    }

    public function profile()
    {
      return $this->hasOne('App\Models\Profile');
    }

    public function getAuthorLinkAttribute()
    {
      return route('browser.authors.show', $this->profile->slug);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " has been {$eventName}";
    }


    public function isAdmin(){        
      return $this->role === self::ADMIN_ROLE;    
    }

    public function bookmarked($type, $id)
    {
      $bookmarked = $this->bookmarks->where('bookmarkable_type', $type)
                            ->where('bookmarkable_id',$id)
                            ->first();
                            

      return $bookmarked ? true : false;
    }

    public function liked($type, $id)
    {
      $liked = $this->likes->where('likeable_type', $type)
                            ->where('likeable_id',$id)
                            ->first();

      return $liked ? true : false;
    }

    public function subscribeToNewsletter()
    {
      if ($this->newsletter) {
        return true;
      } else {
        return false;
      }
    }

    public function getFullNameAttribute()
    {
      return $this->profile->first_name . ' ' .  $this->profile->last_name;
    }

    public function getTotalLikesAttribute()
    {
      $likes = 0;
      $articles = $this->articles;
      if ($articles) {
        foreach ($articles as $article) {

          $likes += $article->likes->count();
        }
      }
      return $likes;
    }
}
