<?php

namespace App\Http\Services\MenuButtonServices;

class GetShopMenuButtonsService extends MenuButtonGetService
{
    public function getShopButtonService()
    {
        return $this->getMenu('shop');
    }
}
