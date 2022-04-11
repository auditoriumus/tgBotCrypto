<?php

namespace App\Http\Services\FileTypesServices;

use App\Http\Services\GetServiceInterface;

class GetFileTypesService extends FileTypesService implements GetServiceInterface
{

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
