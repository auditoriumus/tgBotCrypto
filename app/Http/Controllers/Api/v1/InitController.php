<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\Controller;
use App\Http\Services\ChatServices\CreateChatService;
use App\Http\Services\ChatServices\GetChatService;
use App\Http\Services\FeedbackServices\CreateFeedbackService;
use App\Http\Services\InitServices\InitService;
use App\Http\Services\InlineButtonServices\InlineButtonServices;
use App\Http\Services\LotServices\GetLotGetService;
use App\Http\Services\MenuButtonServices\GetAccountMenuButtonService;
use App\Http\Services\MenuButtonServices\GetBackMenuButtonService;
use App\Http\Services\MenuButtonServices\GetShopMenuButtonsService;
use App\Http\Services\MenuButtonServices\GetStartMenuButtonsService;
use App\Http\Services\SendMessageServices\SendMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;

class InitController extends Controller
{
    private Api $telegram;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->telegram = app(InitService::class)->getTelegram();
    }

    public function entryPoint()
    {
        if (!app(GetChatService::class)->doesExist($this->getChatId())) {
            app(CreateChatService::class)->createChat($this->getChatId());
        }


        if ($this->getText() == '/start' || $this->getText() == 'в начало') {
            Cache::flush();
            $menu = app(GetStartMenuButtonsService::class)->getStartMenuArray();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Меню');
        } elseif (str_contains($this->getText(), 'магазин')) {
            $menu = app(GetShopMenuButtonsService::class)->getShopButtonService();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Выберите:');
        } elseif (str_contains($this->getText(), 'лоты')) {
            $lots = app(GetLotGetService::class)->getAll();
            $lotList = [];
            $i = 0;
            foreach ($lots as $lot) {
                try {
                    $lotInfo = explode('|', $lot->title);
                    $nowYear = Carbon::now();
                    $itemYear = Carbon::create($lotInfo[8]);
                    $lotList[$i]['text'] = $lotInfo[3] . ' ' . $nowYear->diff($itemYear)->y;
                    $lotList[$i]['callback_data'] = 'make-order-lot|' . $lot->id;
                } catch (\Exception $e) {
                    Log::error('Ошибка строки: ' . $e->getMessage());
                }
                $i++;
            }
            $menu = app(GetShopMenuButtonsService::class)->getShopButtonService();
            app(InlineButtonServices::class)->sendButtons($this->telegram, $this->getChatId(), $lotList, 'Выберите:');
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Выберите:');
        } elseif (str_contains($this->getText(), 'мой баланс')) {
            $chatAccount = $this->getChat()->account ?? '0';
            $menu = app(GetAccountMenuButtonService::class)->getAcountMenuButton();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Ваш баланс: ' . $chatAccount);
        } elseif (str_contains($this->getText(), 'пополнить')) {
            Cache::put('deposit|' . $this->getChatId(), true);
            $menu = app(GetBackMenuButtonService::class)->getBackMenuButton();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Введите сумму пополнения в $');
        } elseif (is_numeric($this->getText())) {
            $amount = (float)$this->getText();
            if (Cache::has('deposit|' . $this->getChatId())) {
                $menu = app(GetBackMenuButtonService::class)->getBackMenuButton();
                app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Выводится сумма BTC, пересчитанная по курсу и информация о кошельке:');
            }
        } elseif (str_contains($this->getText(), 'обратная связь')) {
            Cache::put('message|' . $this->getChatId(), true);
            $menu = app(GetBackMenuButtonService::class)->getBackMenuButton();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Напишите свое обращение одним сообщением:');
        } elseif (str_contains($this->getText(), 'правила')) {
            $menu = app(GetBackMenuButtonService::class)->getBackMenuButton();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Здесь описываются правила');
        } elseif (str_contains($this->getText(), 'make-order-lot')) {
            $makeOrder = explode('|', $this->getText());
            $lotId = $makeOrder[1];
        }

//        elseif (str_contains($this->getText(), 'make-order-lot')) {
//            $makeOrder = explode('|', $this->getText());
//            $lotId = $makeOrder[1];
//            $chat_id = app(GetChatService::class)->doesExist($this->getChatId())->id;
//            $orderNumber = time();
//            $orderData = [
//                'lot_id' => $lotId,
//                'chat_id' => $chat_id,
//                'order_number' => $orderNumber,
//            ];
//            if (app(CreateOrderService::class)->create($orderData)) {
//                app(DeleteLotService::class)->softDeleteById($lotId);
//            }
//            $menu = app(GetShopMenuButtonsService::class)->getShopButtonService();
//            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Номер вашего заказа: ' . $orderNumber);
//        }
        else {
            if (Cache::has('message|' . $this->getChatId())) {
                $data = [
                    'message' => $this->getText(),
                    'chat_id' => $this->getChat()->id,
                    'chat' => $this->getChatId(),
                ];
                app(CreateFeedbackService::class)->create($data);
                Cache::delete('message|' . $this->getChatId());
            }
            $menu = app(GetBackMenuButtonService::class)->getBackMenuButton();
            app(SendMenu::class)->sendMenu($this->telegram, $this->getChatId(), $menu, 'Выберите:');
        }
    }
}
