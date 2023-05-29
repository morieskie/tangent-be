<?php

namespace App\Repositories;

use App\Models\EmployeeSkill;
use Illuminate\Support\Collection;

class EmployeeSkillRepository
{
    /**
     * @var EmployeeSkill
     */
    private $model;

    /**
     * __construct
     *
     * @param EmployeeSkill model
     *
     * @return void
     */
    public function __construct(EmployeeSkill $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        $paginator = $this->model->paginate();
        $data = $paginator->getCollection();
        return $paginator;
    }

    public function create(Collection $data)
    {
        $attributes = $data->only($this->model->fillable)->toArray();
        return $this->model->create($attributes)->loadMissing('skill');
    }

    public function read(string $id)
    {
        return $this->model->findOrFail($id);
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
        return $model->delete();
    }
}
