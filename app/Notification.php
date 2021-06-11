<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    public function user($id)
    {
        return User::find($id);
    }

    public function tweet($id)
    {
        return Tweet::find($id);
    }
}
