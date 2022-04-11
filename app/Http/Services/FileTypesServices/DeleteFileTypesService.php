<?php

namespace App\Http\Services\FileTypesServices;

class DeleteFileTypesService extends FileTypesService
{
    public function deleteById($id)
    {
        return $this->repository->deleteById($id);
    }
}
