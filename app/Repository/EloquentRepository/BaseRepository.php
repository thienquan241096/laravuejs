<?php

namespace App\Repository\EloquentRepository;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->getModel();
    }

    /*
     * Get Model
     */
    abstract function getModel();

    /*
     * Set Model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /*
     * Get All
     */
    public function getAll()
    {
        return $this->model->getAll();
    }

    /*
     * Get one
     * @param $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /*
     * create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attribute)
    {
        $result =  $this->model->create($attribute);

        if($result) {
            return $result;
        }

        return false;
    }

    /*
     * Update By Id
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updateById(int $id, array $attribute)
    {
        $result = $this->find($id);

        if($result) {
            $result->update($attribute);

            return $result;
        }

        return false;
    }

    /*
     * Update
     * @param $model
     * @param array $attributes
     * @return mixed
     */
    public function update($model, array $attribute)
    {
        if($model) {
            $model->update($attribute);
        }

        return false;
    }

    /*
     * Delete By Id
     * @param $id
     * @return mixed
     */
    public function deleteById(int $id)
    {
        $result = $this->find($id);

        if($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    /*
     * Delete By Id
     * @param $model
     * @return mixed
     */
    public function delete($model)
    {
        if($model) {
            $model->delete();
            return true;
        }

        return false;
    }
}   