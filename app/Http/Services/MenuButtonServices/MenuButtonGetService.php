<?php

namespace App\Http\Services\MenuButtonServices;

use App\Http\Repositories\MenuButtonRepository\MenuButtonRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\Service;
use App\Http\Services\GetServiceInterface;

class MenuButtonGetService extends Service implements GetServiceInterface
{

    use ButtonTrait;
    /**
     * @var MenuButtonRepository
     */
    protected Repository $repository;

    public function __construct(MenuButtonRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
