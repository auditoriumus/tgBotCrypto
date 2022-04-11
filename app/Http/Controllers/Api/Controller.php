<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\ChatServices\GetChatService;
use App\Http\Services\InputService\GetInputService;
use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
    private string|null $text;
    private int $chatId;
    private $chat;

    private string $callbackQueryText;

    public function __construct(Request $request)
    {
        $this->setText($request);
        $this->setChatId($request);
        $this->setChat($this->chatId);
        if (!empty($request->callback_query)) {
            $this->setCallbackQueryText(($request->callback_query)['data']);
        }

    }

    /**
     * @return string
     */
    public function getCallbackQueryText(): string
    {
        return $this->callbackQueryText;
    }

    /**
     * @param string $callbackQueryText
     */
    public function setCallbackQueryText(string $callbackQueryText): void
    {
        $this->callbackQueryText = $callbackQueryText;
        $this->text = $callbackQueryText;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return mb_strtolower($this->text);
    }


    /**
     * @param Request $request
     * @return void
     */
    public function setText(Request $request): void
    {
        $this->text = app(GetInputService::class)->getText($request);
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function setChatId(Request $request): void
    {
        $this->chatId = app(GetInputService::class)->getChatId($request);
    }


    /**
     * @return mixed
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param mixed $chat
     */
    public function setChat($chatId): void
    {
        $chat = app(GetChatService::class)->doesExist($chatId);
        $this->chat = $chat;
    }
}
