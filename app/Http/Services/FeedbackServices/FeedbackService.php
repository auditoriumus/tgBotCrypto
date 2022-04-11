<?php

namespace App\Http\Services\FeedbackServices;

use App\Http\Repositories\FeedbackRepository\FeedbackRepository;
use App\Http\Repositories\Repository;
use App\Http\Services\GetServiceInterface;
use App\Http\Services\Service;

class FeedbackService extends Service
{
    public function __construct(FeedbackRepository $repository)
    {
        parent::__construct($repository);
    }
}
