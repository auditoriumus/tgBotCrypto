<?php

namespace App\Http\Services\MenuButtonServices;

class GetStartMenuButtonsService extends MenuButtonGetService
{
    public function getStartMenuArray(): array
    {
        return $this->getMenu('start');
    }
}
