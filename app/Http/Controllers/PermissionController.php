<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepositoryEloquent;
use App\Traits\CrudApiTrait;

class PermissionController extends Controller
{
    use CrudApiTrait;

    protected $repository;

    public function __construct(PermissionRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function store(PermissionRequest $request)
    {
        $result = $this->repository->create(['name' => $request->name, 'guard_name'=>'web']);
        return response()->json($result);
    }

    public function update(PermissionRequest $request, $id)
    {
        $result = $this->repository->find($id);
        $result->update($request->all());
        return response()->json($result);
    }
}
