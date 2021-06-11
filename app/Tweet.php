<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    use Likable;

    protected $guarded = [];

    public function user()
    {
        return $this-> belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'likes', 'tweet_id', 'user_id');
    }

}
