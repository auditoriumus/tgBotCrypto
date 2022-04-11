<?php

namespace App\Http\Services\SendMessageServices;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class SendMessage extends SendMessageService
{
    public function sendMessage(Api $stream, int $chat_id, string $text)
    {
        try {
            $stream->sendMessage([
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $text,
            ]);
            return true;
        } catch (\Exception $e) {
            Log::alert('Исключение отправки сообщения: ' . $e->getMessage());
            return false;
        }
    }
}
