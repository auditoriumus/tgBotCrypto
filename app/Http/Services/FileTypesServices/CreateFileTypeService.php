<?php

namespace App\Http\Services\FileTypesServices;

use Illuminate\Http\Request;

class CreateFileTypeService extends FileTypesService
{
    public function create(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string'
        ]);
        if ($validator) {
            return $this->repository->create([
                'title' => $request->input('title')
            ]);
        }
    }
}
