<?php

namespace App\Http\Controllers;

use App\Events\UserFollowedMeEvent;
use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);

        if(auth()->user()->following($user))
        {
            event(new UserFollowedMeEvent($user));
        }

        return back();
    }
}
