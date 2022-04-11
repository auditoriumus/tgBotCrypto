<?php

namespace App\Http\Repositories;

interface RepositoryInterface
{
    public function create(array $data);

    public function getAll();

    public function findById(int $id);

    public function updateById(int $id, array $data);

    public function deleteById(int $id);
}
