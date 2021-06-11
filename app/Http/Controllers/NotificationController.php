<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifications.index', [
            'notifications' => Notification::where('to_user_id', auth()->id())->latest()->get(),
        ]);
    }
}
