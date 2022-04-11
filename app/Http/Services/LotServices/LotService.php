<?php

namespace App\Http\Services\LotServices;

use App\Http\Repositories\LotRepository\LotRepository;
use App\Http\Repositories\Repository;

class LotService extends \App\Http\Services\Service
{
    /**
     * @var LotRepository
     */
    protected Repository $repository;

    public function __construct(LotRepository $repository)
    {
        parent::__construct($repository);
    }
}
