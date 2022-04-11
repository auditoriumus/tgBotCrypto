<?php

namespace App\Http\Repositories\ChatRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\Chat;

class ChatRepository extends Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(Chat $model)
    {
        parent::__construct($model);
    }

    public function checkChatId(int $chat_id)
    {
        return $this->model->where('chat_id', $chat_id)->first();
    }
}
