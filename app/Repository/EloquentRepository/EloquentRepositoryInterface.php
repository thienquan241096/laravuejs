<?php

namespace App\Repository\EloquentRepository;

interface EloquentRepositoryInterface
{
    public function getAll();

    public function find(int $id);

    public function create(array $attribute);

    public function updateById(int $id, array $attribute);

    public function update($model, array $attribute);

    public function deleteById(int $id);
    
    public function delete($model);

}   