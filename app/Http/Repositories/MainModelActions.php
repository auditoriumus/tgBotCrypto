<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Log;

trait MainModelActions
{
    public function create(array $data)
    {
        $model = $this->model;

        foreach ($data as $field => $value) {
            $model->{$field} = $value;
        }

        try {
            if ($this->model->save()) return $this->model;
        } catch (\Exception $e) {
            Log::error('Ошибка сохранения модели: ', [
                'model' => get_class($this->model),
                'message' => $e->getMessage()
            ]);
            return false;
        }
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function updateById(int $id, array $data)
    {
        $model = $this->findById($id);
        if (empty($model)) {
            return false;
        }

        foreach ($data as $field => $value) {
            $model->{$field} = $value;
        }

        try {
            if ($model->update()) return $model;
        } catch (\Exception $e) {
            Log::error('Ошибка обновления модели: ', [
                'model' => get_class($this->model),
                'message' => $e->getMessage()
            ]);
            return false;
        }

    }

    public function deleteById(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
