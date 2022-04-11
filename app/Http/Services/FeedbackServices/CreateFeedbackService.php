<?php

namespace App\Http\Services\FeedbackServices;

class CreateFeedbackService extends FeedbackService
{
    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
