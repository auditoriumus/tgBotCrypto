<?php

namespace App\Http\Services\InlineButtonServices;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class InlineButtonServices
{
    public function sendButtons(Api $stream, int $chat_id, array $list, string $text)
    {
        $keyboard = $this->generateList($list);

        try {
            $stream->sendMessage([
                'chat_id' => $chat_id,
                'text' => $text,
                'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
            ]);
            return true;
        } catch (\Exception $e) {
            Log::alert('Исключение отправки сообщения: ' . $e->getMessage());
            return false;
        }
    }

    public function generateList(array $list): array
    {
        $keyboard = [];

        foreach ($list as $item) {
            $keyboard[] = [$item];
        }

        return $keyboard;
    }
}
