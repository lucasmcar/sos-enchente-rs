<?php 

namespace App\Bot;

use TelegramBot\Api\BotApi;

class Bot extends Api
{
    private $botApi;
    private $bot;

    public function __construct(string $token)
    {
        $this->bot = new BotApi($token);

        $this->botApi = new Api();

        $this->botApi->setChatId($token);
       
    }

    public function sendMessage($message, $parseMode, $disablePreview, $replyToMessageId, $replyMarkup)
    {
        try {
            $this->bot->sendMessage($this->botApi->getChatId(), $message, $parseMode, $disablePreview, $replyToMessageId, $replyMarkup);
            return true;
        } catch (\Exception $botEx) {
            $botEx->getMessage();
        }
    }
} 