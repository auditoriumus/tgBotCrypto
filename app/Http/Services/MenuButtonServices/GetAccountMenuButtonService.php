<?php

namespace App\Http\Services\MenuButtonServices;

class GetAccountMenuButtonService extends MenuButtonGetService
{
    public function getAcountMenuButton()
    {
        return $this->getMenu('account');
    }
}
