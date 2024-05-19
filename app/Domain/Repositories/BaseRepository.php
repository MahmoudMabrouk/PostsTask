<?php

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{

    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModelQuery($conditions = [], $with = [])
    {
        $query = $this->model;
        if($conditions){
            $query = $query->where($conditions);
        }
        return $query;
    }

    public function findModel($model, $withRelation = [])
    {
        return $this->model::with($withRelation)->findOrFail($model);
    }

    public function updateModel($modelData, $model)
    {
        $model = is_object($model) ? $model : $this->model::find($model);
        $model ? $model->update($modelData) : null ;
        return $model;
    }

    public function createModel($modelData)
    {
        return $this->model::create($modelData);
    }

    public function deleteModel($model)
    {
        $model = is_object($model) ? $model : $this->model::find($model);
        return  $model ? $model->delete() : null;
    }
}
