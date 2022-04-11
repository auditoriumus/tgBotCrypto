<?php

namespace App\Http\Services\FileServices;

use App\Http\Repositories\FileRepository\FileRepository;
use Illuminate\Http\Request;

class UpdateFileService extends FileService
{
    public function update($id, Request $request)
    {
        if ($request->has(['title', 'price', 'filetype'])) {

            $data = [
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'file_types_id' => $request->input('filetype'),
            ];

            if ($request->has('file')) {
                $path = app(CreateFileService::class)->saveFileToStorage($request);
                $data['source'] = $path;
            }

            $file = app(FileRepository::class)->updateById($id, $data);
            return $file ?? false;
        }
    }
}
