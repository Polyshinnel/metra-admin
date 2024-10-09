<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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

//        $json = json_encode($message->text, JSON_UNESCAPED_UNICODE);
//        Storage::disk('local')->put('telegram.json', $json);

        if($message->text == 'Мой id') {
            $telegramId = $message->getChat()->getId();
            $text = sprintf('Ваш чат id: %s', $telegramId);
            $this->botsManager->sendMessage([
                'chat_id' => $telegramId,
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);
        }


        return response(null, 200);
    }
}
