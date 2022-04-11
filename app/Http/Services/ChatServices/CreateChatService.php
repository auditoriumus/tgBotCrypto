<?php

namespace App\Http\Services\ChatServices;

class CreateChatService extends ChatGetService
{
    public function createChat(int $chatId)
    {
        $data = [
            'chat_id' => $chatId
        ];
        return $this->repository->create($data);
    }
}
