<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id',
        'text'
    ];

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }
}
