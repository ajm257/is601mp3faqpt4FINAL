<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body'];


    public function user()
    {
        return $this->belongsTo('App\User'); //answer belongs to a user
    }
    public function question()
    {
        return $this->belongsTo('App\Question'); //answer belongs to question
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
