<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function index()
    {
        return view('tweets.index');
    }

    public function store(Request $request)
    {
        $validated = request()->validate(['body' => 'required|max:191']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        $request->session()->flash('new-tweet', 'New tweet has been posted!');

        return redirect('/tweets');

    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return back();
    }

}
