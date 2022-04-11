<?php

namespace App\Http\Repositories\MenuButtonRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\MenuButton;

class MenuButtonRepository extends Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(MenuButton $model)
    {
        parent::__construct($model);
    }
}
