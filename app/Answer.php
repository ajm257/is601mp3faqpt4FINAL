<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User'); //answer belongs to a user
    }
    public function question()
    {
        return $this->belongsTo('App\Question'); //answer belongs to question
    }
}
