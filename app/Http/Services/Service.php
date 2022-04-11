<?php

namespace App\Http\Services;

use App\Http\Repositories\Repository;

class Service
{
    protected Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
}
