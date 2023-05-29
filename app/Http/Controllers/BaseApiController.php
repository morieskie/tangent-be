<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseApiController extends Controller
{
    protected $repostitory;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = null;
        $status = 200;
        try {
            $data = $this->repository->list($request->collect());
        } catch (\Throwable $th) {
            $data = [
                'error' => $th->getMessage()
            ];
        }

        return response($data, $status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = 201;
        $data = null;
        try {
            $this->beforeCreate($request, function ($request) use (&$data) {
                $data = $this->repository->create($request->collect());
            });
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            $status = 404;
        } catch (\Throwable $th) {
            $status = 400;
            $data = [
                'error' => $th->getMessage()
            ];
        }
        return response($data, $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $status = 200;
        $data = null;

        try {
            $data = $this->repository->read($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            $status = 404;
        } catch (\Throwable $th) {
            $status = 500;
            $data = [
                'error' => $th->getMessage()
            ];
        }

        return response($data, $status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = 201;
        $data = null;
        try {
            $data = $this->repository->update($id, $request->collect());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            $status = 404;
        } catch (\Throwable $th) {
            $status = 500;
            $data = [
                'error' => $th->getMessage()
            ];
        }
        return response($data, $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $status = 204;
        $data = null;
        try {
            $this->beforeDelete($request, $id, function ($itemId) use (&$data) {
                $data = $this->repository->delete($itemId);
            });
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            $status = 404;
        } catch (\Throwable $th) {
            $status = 500;
            $data = [
                'error' => $th->getMessage()
            ];
        }
        return response($data, $status);
    }

    abstract public function beforeCreate(Request $request, callable $fn): void;

    abstract public function beforeDelete(Request $request, string $id, callable $fn): void;
}
