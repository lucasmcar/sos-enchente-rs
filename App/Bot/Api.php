<?php

namespace App\Bot;

class Api
{

    private $chatId;

    public function getChatId()
    {
        return $this->chatId;
    }

    public function setChatId(string $token)
    {
        $chatId = null;

        $endpoint = "https://api.telegram.org/bot{$token}/getUpdates";

        $content = file_get_contents($endpoint);

        if($content == '' || $content == null){
            return null;
        }

        $arrayContent = json_decode($content, true);

        if(!isset($arrayContent['result'][0]['message']['chat']['id'])){
            return null;
        }

        $chatId = $arrayContent['result'][0]['message']['chat']['id'];

        $this->chatId = $chatId;
    }
} 