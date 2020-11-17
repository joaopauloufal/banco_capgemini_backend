<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepositoryEloquent;
use App\Traits\CrudApiTrait;

class RoleController extends Controller
{
    use CrudApiTrait;

    protected $repository;

    public function __construct(RoleRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }


    public function store(RoleRequest $request)
    {
        $result = $this->repository->create(['name' => $request->name, 'guard_name'=>'web']);

        if ($request->permissions){
            $permissions = json_decode($request->permissions);
            $result->syncPermissions(array_column($permissions, 'name'));
        } else {
            $result->syncPermissions([]);
        }

        return response()->json($result);
    }

    public function update(RoleRequest $request, $id)
    {
        $result = $this->repository->find($id);

        if ($request->permissions){
            $permissions = json_decode($request->permissions);
            $result->syncPermissions(array_column($permissions, 'name'));
        } else {
            $result->syncPermissions([]);
        }

        $result->update(['name' => $request->name]);
        return response()->json($result);
    }
}
