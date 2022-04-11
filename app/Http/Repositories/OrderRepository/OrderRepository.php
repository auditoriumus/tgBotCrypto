<?php

namespace App\Http\Repositories\OrderRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\Order;

class OrderRepository extends Repository implements  RepositoryInterface
{
    use MainModelActions;

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
}
