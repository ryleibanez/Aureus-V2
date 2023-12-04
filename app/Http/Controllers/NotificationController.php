<?php

namespace App\Http\Controllers;

use App\Models\notificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //


    public function checkNotif()
    {
        $notification = notificationModel::where('email', auth()->user()->email)
            ->where('status', 'false')
            ->first();

        if ($notification) {
            // Mark the notification as read
            $notification->update(['status' => 'true']);

            return response()->json(['notifMsg' => $notification->message]);
        }

        return response()->json(['notifMsg' => null]);
    } 
}
