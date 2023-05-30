<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Collection;

class EmployeeRepository
{
    /**
     * @var Employee
     */
    private $model;

    /**
     *
     */
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function list(Collection $data = null)
    {
        $query = $this->model->newQuery();
        if ($data->has('query')) {
            $query->orWhere('first_name', 'like', $data->get('query') . '%');
            $query->orWhere('last_name', 'like', $data->get('query') . '%');
            $query->orWhere('email', 'like', '%' . $data->get('query') . '%');
        }

        if ($data->has('year_of_birth')) {
            $query->whereYear('date_of_birth', $data->get('year_of_birth'));
        }

        if ($data->has('skills')) {
            $skillModel = $this->model->skills()->newQuery();
            $skillModel->whereIn('skill', $data->get('skills'));
            $query->whereYear('date_of_birth', $data->get('year_of_birth'));
        }

        $paginator = $query->paginate();
        $data = $paginator->getCollection();
        return $paginator;
    }

    public function create(Collection $data)
    {
        $code = fake()->regexify('[A-Z]{2}[0-9]{4}');
        $data->put('id', $code);
        $attributes = $data->only($this->model->fillable)->toArray();
        return $this->model->create($attributes);
    }

    public function read(string $id)
    {
        return $this->model->with('skills')->findOrFail($id);
    }

    public function update(string $id, Collection $data)
    {
        $attributes = $data->only($this->model->fillable)->toArray();
        $model = $this->model->findOrFail($id);
        return $model->update($attributes);
    }

    public function delete(string $id)
    {
        $model = $this->model->findOrFail($id);
        return model->delete();
    }
}
