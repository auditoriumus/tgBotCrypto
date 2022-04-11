<?php

namespace App\Http\Services\FileServices;

use Illuminate\Http\Request;

class DeleteFileService extends FileService
{
    public function deleteById($id)
    {
        return $this->repository->deleteById($id);
    }
}
