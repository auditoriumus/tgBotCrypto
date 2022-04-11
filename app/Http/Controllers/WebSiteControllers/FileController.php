<?php

namespace App\Http\Controllers\WebSiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Services\FileServices\CreateFileService;
use App\Http\Services\FileServices\DeleteFileService;
use App\Http\Services\FileServices\GetFileService;
use App\Http\Services\FileServices\UpdateFileService;
use App\Http\Services\FileTypesServices\GetFileTypesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class FileController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('filetype')) {
            $files = app(GetFileService::class)->getFilesByFileTypeId($request->get('filetype'));
        } else {
            $files = app(GetFileService::class)->getAll();
        }
        $fileTypes = app(GetFileTypesService::class)->getAll();
        View::share([
            'files' => $files,
            'filetypes' => $fileTypes,
        ]);
        return view('filelist');
    }

    public function create()
    {
        $fileTypes = app(GetFileTypesService::class)->getAll();
        View::share([
            'filetypes' => $fileTypes,
        ]);
        return view('createfile');
    }

    public function store(FileRequest $request)
    {
        $id = app(CreateFileService::class)->create($request);
        if (!empty($id)) {
            return $this->edit($id);
        }
        return $this->index($request);
    }

    public function edit($id)
    {
        $file = app(GetFileService::class)->getById($id);
        $fileTypes = app(GetFileTypesService::class)->getAll();
        View::share([
            'file' => $file,
            'filetypes' => $fileTypes,
        ]);
        return view('createfile');
    }


    public function update(FileRequest $request, $id)
    {
        $file = app(UpdateFileService::class)->update($id, $request);
        View::share([
            'file' => $file,
        ]);
        return $this->edit($file->id); //TODO
    }


    public function destroy($id)
    {
        app(DeleteFileService::class)->deleteById($id);
        return $this->index();
    }

    public function getFile($id)
    {
        $path = app(GetFileService::class)->getFileById($id);
        return Storage::download($path);
    }
}
