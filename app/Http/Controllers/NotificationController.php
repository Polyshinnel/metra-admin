<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Telegram\SendController;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Telegram\Bot\BotsManager;

class NotificationController extends Controller
{
    protected BotsManager $botsManager;
    public function __construct(BotsManager $botsManager)
    {
        $this->botsManager = $botsManager;
    }
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

    public function createNotifications(NotificationRequest $request) {
        $data = $request->validated();
        $type = $data['type'];
        $title = $data['title'];
        $text = $data['text'];

        $createArr = [
            'notification_title' => $title,
            'notification_text' => $text,
            'notification_type' => $type,
            'publish_status' => 0,
            'date_create' => date('Y-m-d H:i:s'),
            'date_publish' => date('Y-m-d H:i:s')
        ];
        Notification::create($createArr);
        return redirect('/notifications');
    }

    public function publishNotification(Notification $notification) {
        $notification->update(['publish_status' => 1, 'date_publish' => date('Y-m-d H:i:s')]);
        $users = User::where(['status' => 1])->get();

        $returnArr = [
            'msg' => 'Success',
            'err' => 'none'
        ];

        if(!$users->isEmpty()) {
            $telegramSendController = new SendController($this->botsManager);
            foreach ($users as $user) {
                $createArr = [
                    'user_id' => $user->id,
                    'notification_id' => $notification->id,
                    'status' => 0
                ];
                UserNotification::create($createArr);

                if(!empty($user->telegram_id)) {
                    $type = '🔔 Уведомление';
                    if($notification->notification_type == 2) {
                        $type = '⚠️ Оповещение!';
                    }
                    $text = $notification->notification_text;
                    $title = $notification->notification_title;
                    $telegramText = "<b>$type</b>\r\n<b>$title</b>\r\n$text";
                    $telegramSendController->sendMessage($user->telegram_id, $telegramText);
                }
            }
        }

        return response()->json($returnArr);
    }

    public function deleteNotification(Notification $notification) {
        $notification->delete();
        $returnArr = [
            'msg' => 'Success',
            'err' => 'none'
        ];
        return response()->json($returnArr);
    }
}
