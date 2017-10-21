<?php

namespace Kenswitch\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Kenswitch\Repositories\Contracts\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Kenswith
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of 
            Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    /**
     * @param array $column
     * @return mixed
     */
    public function all($column = ['*'])
    {
        return $this->model->get($column);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id") {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*']) {
        return $this->model->where($attribute, '=', $value)->get($columns);
    }
}