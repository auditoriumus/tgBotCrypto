<?php

namespace App\Http\Services\FileServices;

use App\Http\Services\GetServiceInterface;

class GetFileService extends FileService implements GetServiceInterface
{
    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->findById($id);
    }

    public function getFileById(int $id)
    {
        return $this->repository->findById($id)->source;
    }

    public function getFilesByFileTypeId(int $id)
    {
        return $this->repository->getFilesByFileTypeId($id);
    }
}
