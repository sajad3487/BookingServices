<?php

namespace App\DesignPatterns;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    // model property on class instances
    public $model;

    public $columns = '*';

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function getAll()
    {
        return $this->model->select($this->getColumns())->orderBy('created_at', 'desc')->get();
    }

    public function getEnabled()
    {
        return $this->model->where(['status' => true])->get();
    }

    public function getById($id)
    {
        return ($this->model->select($this->getColumns())->find($id));
    }

    public function getByIdOrFail($id): Model
    {
        return ($this->model->select($this->getColumns())->findOrFail($id));
    }

    // create a new record in the database
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        return $record->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param mixed $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @param null $filter
     * @param null $with
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginationAndFilter($filter = null, $with = null)
    {
        $q = $this->model;

        if (!empty($with)) {

            foreach ($with as $model => $fields) {
                $q = $q->with($fields);
            }
        }

        if (!empty($filter)) {

            foreach ($filter as $key => $value) {
                $q = $q->where($key, $value);
            }
        }

        $q->select($this->getColumns())->orderBy('created_at', 'desc');

        return $q->paginate(config('general.paginate_number'));
    }

    public function changeStatus($item, $newStatus)
    {
        $item->status = $newStatus;
        $item->save();

        return $item;
    }

    public function updateOrCreate(array $query, array $data): Model
    {
        return $this->model->updateOrCreate($query, $data);
    }
}
