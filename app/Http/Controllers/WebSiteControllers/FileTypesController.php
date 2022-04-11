<?php

namespace App\Http\Controllers\WebSiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\FileTypesServices\CreateFileTypeService;
use App\Http\Services\FileTypesServices\DeleteFileTypesService;
use App\Http\Services\FileTypesServices\GetFileTypesService;
use App\Http\Services\FileTypesServices\UpdateFileTypesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FileTypesController extends Controller
{
    public function index()
    {
        $fileTypes = app(GetFileTypesService::class)->getAll();
        View::share([
            'filetypes' => $fileTypes
        ]);
        return view('settings');
    }

    public function store(Request $request)
    {
        app(CreateFileTypeService::class)->create($request);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        app(UpdateFileTypesService::class)->update($id, $request);
        return $this->index();
    }

    public function destroy($id)
    {
        app(DeleteFileTypesService::class)->deleteById($id);
        return $this->index();
    }
}
