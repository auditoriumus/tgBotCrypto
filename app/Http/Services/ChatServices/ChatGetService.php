<?php

namespace App\Http\Services\ChatServices;

use App\Http\Repositories\ChatRepository\ChatRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\Service;
use App\Http\Services\GetServiceInterface;


class ChatGetService extends Service implements GetServiceInterface
{
    /**
     * @var ChatRepository
     */
    protected Repository $repository;

    public function __construct(ChatRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
