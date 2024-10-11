<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\BotsManager;
use function PHPUnit\Framework\isEmpty;

class BotController extends Controller
{
    protected BotsManager $botsManager;
    public function __construct(BotsManager $botsManager)
    {
        $this->botsManager = $botsManager;
    }
    public function __invoke(Request $request): Response {
        $this->botsManager->bot()->commandsHandler(true);
        $updates = $this->botsManager->getWebhookUpdate();
        $message = $updates->getMessage();

        $json = json_encode($updates, JSON_UNESCAPED_UNICODE);
        Storage::disk('local')->put('telegram.json', $json);

        $messageText = $message->text;
        $messageTextArr = explode(';', $messageText);

        if($messageTextArr[0] == 'Мой id') {
            $telegramId = $message->getChat()->getId();
            $text = sprintf('Ваш чат id: %s', $telegramId);
            $this->botsManager->sendMessage([
                'chat_id' => $telegramId,
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);
        }



        if($messageTextArr[0] == 'Регистрация') {
            $telegramId = $message->getChat()->getId();
            $register = $this->register($messageTextArr, $telegramId);
            $registerText = 'Регистрация не пройдена, ошибка в логине и/или пароле';
            if($register) {
                $registerText = 'Регистрация успешно завершена';
            }
            $this->botsManager->sendMessage([
                'chat_id' => $telegramId,
                'text' => $registerText,
                'parse_mode' => 'HTML'
            ]);
        }

        return response(null, 200);
    }

    private function register(array $messageArr, $telegramId) {
        $mail = trim($messageArr[1]);
        $password = md5(trim($messageArr[2]));
        $user = User::where(['mail' => $mail, 'password' => $password])->first();
        if($user) {
            $user->update(['telegram_id' => $telegramId]);
            return true;
        }
        return false;
    }
}
