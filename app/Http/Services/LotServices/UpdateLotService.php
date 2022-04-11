<?php

namespace App\Http\Services\LotServices;

use Illuminate\Http\Request;

class UpdateLotService extends LotService
{
    public function updateById(int $id, Request $request)
    {
        if ($request->has(['title', 'price'])) {
            return $this->repository->updateById($id ,[
                'title' => $request->input('title'),
                'price' => $request->input('price'),
            ]);
        }
    }
}
