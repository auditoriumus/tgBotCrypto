<?php

namespace App\Http\Services\ChatServices;

use Illuminate\Http\Request;

class GetChatService extends ChatGetService
{
    public function doesExist(int $chatId)
    {
        return $this->repository->checkChatId($chatId);
    }
}
