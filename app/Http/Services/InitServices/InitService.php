<?php

namespace App\Http\Services\InitServices;

use Telegram\Bot\Api;

class InitService
{
    private Api $telegram;

    public function __construct()
    {
        $this->setTelegram();
    }

    /**
     * @return void
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    private function setTelegram()
    {
        $this->telegram = new Api(env('TG_TOKEN'));
    }

    /**
     * @return Api
     */
    public function getTelegram(): Api
    {
        return $this->telegram;
    }
}
