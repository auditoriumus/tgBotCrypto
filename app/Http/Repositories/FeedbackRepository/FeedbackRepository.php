<?php

namespace App\Http\Repositories\FeedbackRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\Feedback;

class FeedbackRepository extends Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(Feedback $model)
    {
        parent::__construct($model);
    }
}
