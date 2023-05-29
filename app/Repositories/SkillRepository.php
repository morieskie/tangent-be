<?php

namespace App\Repositories;

use App\Models\Skill;
use Illuminate\Support\Collection;

class SkillRepository
{
    /**
     * @var Skill
     */
    private $model;

    /**
     * __construct
     *
     * @param Skill model
     *
     * @return void
     */
    public function __construct(Skill $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        $paginator = $this->model->paginate();
        $data = $paginator->getCollection();
        return $paginator;
    }

    public function createIfNotExists(Collection $data)
    {
        $model = $this->model->where('name', $data->get('skill'))->first();

        if (!$model) {
            $model = $this->model->create(['name' => $data->get('skill')]);
        }
        return $model;
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
        return model->delete();
    }
}
