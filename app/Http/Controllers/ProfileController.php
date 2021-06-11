<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'username' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'name' => ['string', 'required', 'max:255'],
            'password' => ['required'],
            'avatar' => ['image'],
            'bio' => ['string', 'max:255', 'nullable'],
            'banner' => ['image'],
            'email' => ['string', 'required', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        if (request('avatar')) {
            request('avatar')->store('avatars');

            $avatarDeleteName = Str::afterLast($user->avatar, '/');
            if(!($avatarDeleteName == 'avatar-placeholder.png'))
            {
                Storage::delete('avatars/' . $avatarDeleteName);
            }


            $data['avatar'] = request('avatar')->hashName();
        }

        if (request('banner')) {

            request('banner')->store('banners');

            $bannerDeleteName = Str::afterLast($user->banner, '/');
            if(!($bannerDeleteName == 'default-banner.jpg'))
            {
                Storage::delete('banners/' . $bannerDeleteName);
            }


            $data['banner'] = request('banner')->hashName();
        }
        $user->update($data);

        return redirect($user->path());
    }
}
