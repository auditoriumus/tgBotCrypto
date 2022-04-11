<?php

namespace App\Http\Services\LotServices;

use Illuminate\Http\Request;

class CreateLotService extends LotService
{
    public function create(Request $request)
    {
        if ($request->has(['title', 'price'])) {
            return $this->repository->create([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
            ]);
        }
    }
}
