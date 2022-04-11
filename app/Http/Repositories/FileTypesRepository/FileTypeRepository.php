<?php

namespace App\Http\Repositories\FileTypesRepository;

use App\Http\Repositories\MainModelActions;
use App\Http\Repositories\Repository;
use App\Http\Repositories\RepositoryInterface;
use App\Models\FileType;

class FileTypeRepository extends Repository implements RepositoryInterface
{
    use MainModelActions;

    public function __construct(FileType $model)
    {
        parent::__construct($model);
    }
}
