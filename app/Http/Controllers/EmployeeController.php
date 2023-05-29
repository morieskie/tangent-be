<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends BaseApiController
{
    protected $repository;

    /**
     * __construtor
     *
     * @param EmployeeRepository repository
     *
     * @return void
     */
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeCreate(Request $request, callable $fn): void
    {
        $fn($request);
    }

    public function beforeDelete(Request $request, string $id, callable $fn): void
    {
        $fn($request->get('id'));
    }
}
