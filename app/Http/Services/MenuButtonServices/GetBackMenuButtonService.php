<?php

namespace App\Http\Services\MenuButtonServices;

class GetBackMenuButtonService extends MenuButtonGetService
{
    public function getBackMenuButton()
    {
        return $this->getMenu(null);
    }
}
