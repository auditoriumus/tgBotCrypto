<?php

namespace App\Http\Services\FileServices;

use App\Http\Repositories\FileRepository\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreateFileService extends FileService
{
    public function create(Request $request)
    {
        if ($request->has(['title', 'price', 'filetype', 'file'])) {

            $path = $this->saveFileToStorage($request);

            $fileRow = app(FileRepository::class)->create([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'file_types_id' => $request->input('filetype'),
                'source' => $path,
            ]);
            if (!empty($fileRow)) return $fileRow->id;
        }
    }

    public function saveFileToStorage(Request $request)
    {
        if ($request->has('file')) {
            return $request->file('file')->store('files');
        }
        return false;
    }
}
