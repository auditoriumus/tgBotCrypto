<?php

namespace App\Http\Repositories\FileRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\File;

class FileRepository extends Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(File $model)
    {
        parent::__construct($model);
    }

    public function getFilesByFileTypeId($id)
    {
        return $this->model->where('file_types_id', $id)->get() ?? false;
    }
}
