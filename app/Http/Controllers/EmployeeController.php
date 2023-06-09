<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use ReverseRegex\Lexer;
use ReverseRegex\Random\SimpleRandom;
use ReverseRegex\Parser;
use ReverseRegex\Generator\Scope;

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

    public function beforeUpdate(Request $request, string $id, callable $fn): void
    {
        $fn($id, $request);
    }

    public function beforeDelete(Request $request, string $id, callable $fn): void
    {
        $fn($request->get('id'));
    }
}
