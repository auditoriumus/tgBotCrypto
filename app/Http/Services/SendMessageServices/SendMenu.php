<?php

namespace App\Http\Services\SendMessageServices;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class SendMenu extends SendMessageService
{
    public function sendMenu(Api $stream, int $chat_id, array $keyboard, string $text)
    {

        $reply_markup = [
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];

        try {
            $stream->sendMessage([
                'chat_id' => $chat_id,
                'text' => $text,
                'reply_markup' => json_encode($reply_markup)
            ]);
            return true;
        } catch (\Exception $e) {
            Log::alert('Исключение отправки сообщения: ' . $e->getMessage());
            return false;
        }
    }
}
