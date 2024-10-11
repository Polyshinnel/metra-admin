<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\BotsManager;

class SendController extends Controller
{
    protected BotsManager $botsManager;
    public function __construct(BotsManager $botsManager)
    {
        $this->botsManager = $botsManager;
    }

    public function sendMessage(string $telegram_id, string $text) {
        $this->botsManager->sendMessage([
            'chat_id' => $telegram_id,
            'text' => $text,
            'parse_mode' => 'HTML'
        ]);
    }
}
