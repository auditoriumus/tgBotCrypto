<?php

namespace App\Http\Controllers\WebSiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLotRequest;
use App\Http\Services\LotServices\CreateByExcelService;
use App\Http\Services\LotServices\CreateLotService;
use App\Http\Services\LotServices\DeleteLotService;
use App\Http\Services\LotServices\GetLotGetService;
use App\Http\Services\LotServices\UpdateLotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LotController extends Controller
{
    public function index()
    {
        $lots = app(GetLotGetService::class)->getAll();
        View::share([
            'lots' => $lots
        ]);
        return view('lotlist');
    }


    public function create()
    {
        return view('createlot');
    }


    public function store(CreateLotRequest $request)
    {
        if ($request->has('file')) {
            app(CreateByExcelService::class)->createByExcel($request);
        } else {
            $lot = app(CreateLotService::class)->create($request);
            if (!empty($id)) {
                return $this->edit($lot->id);
            }
        }

        return $this->index();
    }


    public function edit($id)
    {
        $lot = app(GetLotGetService::class)->getById($id);
        View::share([
            'lot' => $lot
        ]);
        return view('createlot');
    }


    public function update(CreateLotRequest $request, $id)
    {
        $lot = app(UpdateLotService::class)->updateById($id, $request);
        View::share([
            'lot' => $lot
        ]);
        return view('createlot');
    }


    public function destroy($id)
    {
        app(DeleteLotService::class)->softDeleteById($id);
        return $this->index();
    }
}
