<?php

namespace Kenswitch\Repositories\Contracts;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = ['*']);

    public function findBy($field, $value, $columns = ['*']);
}