<?php

namespace App\Http\Controllers\Telegram\Commands;


use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{
    protected $name = 'start';
    protected $aliases = ['join'];
    protected $description = 'Команда для начала работы';

    public function handle(){
        $this->replyWithMessage([
            'text' => 'Добрый день! Это телеграм бот дилерского кабинета Метра! С моей помощью Вы будете получать
            все актуальные новости и уведомления, восстанавливать пароли и многое другое',
        ]);
    }
}
