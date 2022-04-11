<?php

namespace App\Http\Repositories\LotRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\RepositoryInterface;
use App\Models\Lot;
use Illuminate\Database\Eloquent\Model;

class LotRepository extends \App\Http\Repositories\Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(Lot $model)
    {
        parent::__construct($model);
    }
}
