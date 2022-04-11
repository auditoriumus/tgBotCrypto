<?php

namespace App\Http\Services\FileTypesServices;

use Illuminate\Http\Request;

class UpdateFileTypesService extends FileTypesService
{
    public function update($id, Request $request)
    {
        return $this->repository->updateById($id, [
            'title' => $request->input('title')
        ]);
    }
}
