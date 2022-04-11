<?php

namespace App\Http\Services\InputService;

use Illuminate\Http\Request;

class GetInputService extends InputService
{
    public function getText(Request $request)
    {
        return $request->input('message')['text'] ?? null;
    }

    public function getChatId(Request $request)
    {
        return $request->input('message')['chat']['id'] ?? $request->input('callback_query')['from']['id'];
    }

    public function getChat(Request $request)
    {
        return $request->input('message')['chat'];
    }
}
