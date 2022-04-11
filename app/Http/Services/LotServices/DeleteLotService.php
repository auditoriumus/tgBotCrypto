<?php

namespace App\Http\Services\LotServices;

class DeleteLotService extends LotService
{
    public function softDeleteById(int $id)
    {
        return $this->repository->deleteById($id);
    }
}
