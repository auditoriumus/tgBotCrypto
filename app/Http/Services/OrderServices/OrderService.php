<?php

namespace App\Http\Services\OrderServices;

use App\Http\Repositories\OrderRepository\OrderRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\Service;

class OrderService extends Service
{
    /**
     * @var OrderRepository
     */
    protected Repository $repository;

    public function __construct(OrderRepository $repository)
    {
        parent::__construct($repository);
    }
}
