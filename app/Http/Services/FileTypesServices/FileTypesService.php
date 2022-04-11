<?php

namespace App\Http\Services\FileTypesServices;

use App\Http\Repositories\FileTypesRepository\FileTypeRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\Service;

class FileTypesService extends Service
{
    /**
     * @var FileTypeRepository
     */
    protected Repository $repository;

    public function __construct(FileTypeRepository $repository)
    {
        parent::__construct($repository);
    }
}
