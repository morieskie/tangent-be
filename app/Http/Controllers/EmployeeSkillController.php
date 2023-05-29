<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeSkillRequest;
use App\Http\Requests\UpdateEmployeeSkillRequest;
use App\Repositories\EmployeeSkillRepository;
use App\Repositories\SkillRepository;
use Illuminate\Http\Request;

class EmployeeSkillController extends BaseApiController
{
    protected $repository;
    private $skillRepository;

    /**
     * __construtor
     *
     * @param EmployeeSkillRepository repository
     *
     * @return void
     */
    public function __construct(EmployeeSkillRepository $repository, SkillRepository $skillRepository)
    {
        $this->repository = $repository;
        $this->skillRepository = $skillRepository;
    }

    public function beforeCreate(Request $request, callable $fn): void
    {
        $skill = $this->skillRepository->createIfNotExists($request->collect());
        $request->merge(['skill_id' => $skill->id]);
        $fn($request);
    }


    public function beforeDelete(Request $request, string $id, callable $fn): void
    {
        $fn($request->get('employeeSkillId'));
    }
}
