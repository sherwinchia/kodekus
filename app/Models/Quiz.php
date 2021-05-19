<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'article_id',
        'description'
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
