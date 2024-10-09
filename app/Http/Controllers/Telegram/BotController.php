<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Telegram\Bot\BotsManager;

class BotController extends Controller
{
    protected BotsManager $botsManager;
    public function __construct(BotsManager $botsManager)
    {
        $this->botsManager = $botsManager;
    }
    public function __invoke(Request $request): Response {
        $updates = $this->botsManager->getWebhookUpdate();
        $message = $updates->getMessage();
        if($message == 'Мой id') {
            $telegramId = $message->getChat()->getId();
            $this->botsManager->sendMessage([
                'chat_id' => $telegramId,
                'text' => $message,
                'parse_mode' => 'HTML'
            ]);
        }
    }
}
