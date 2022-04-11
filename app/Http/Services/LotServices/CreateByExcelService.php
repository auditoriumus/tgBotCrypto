<?php

namespace App\Http\Services\LotServices;

use App\Imports\LotsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CreateByExcelService extends LotService
{
    public function createByExcel(Request $request)
    {
        $path = $request->file('file')->store('excels');
        $this->import($path);
    }

    public function import(string $path)
    {
        Excel::import(new LotsImport, $path);
        return true;
    }
}
