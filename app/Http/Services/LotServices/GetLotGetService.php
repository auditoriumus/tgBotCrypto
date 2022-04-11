<?php

namespace App\Http\Services\LotServices;

use App\Http\Repositories\LotRepository\LotRepository;
use App\Http\Repositories\Repository;

class GetLotGetService extends LotService implements \App\Http\Services\GetServiceInterface
{

    public function __construct(LotRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        return $this->repository->findById($id);
    }
}
