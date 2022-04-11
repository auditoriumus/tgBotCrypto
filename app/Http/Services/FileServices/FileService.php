<?php

namespace App\Http\Services\FileServices;

use App\Http\Repositories\FileRepository\FileRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\Service;

class FileService extends Service
{
    /**
     * @var FileRepository
     */
    protected Repository $repository;

    public function __construct(FileRepository $repository)
    {
        parent::__construct($repository);
    }
}
