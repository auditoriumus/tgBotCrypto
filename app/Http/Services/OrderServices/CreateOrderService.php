<?php

namespace App\Http\Services\OrderServices;

use Illuminate\Http\Request;

class CreateOrderService extends OrderService
{
    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
