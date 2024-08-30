<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::all();
        $pageInfo = [
            'title' => 'Оповещения'
        ];

        if(!$notifications) {
            $notifications = [];
        }
        return view('notifications.notifications', ['pageInfo' => $pageInfo, 'notifications' => $notifications]);
    }
}
