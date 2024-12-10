<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function make_notifications_seen(Request $request)
    {

        Notification::where('user_id', auth()->id())->update(['is_seen' => 1]);
        return response()->json(array('response_type'=> 1));
        
    }
}
