<?php

namespace App\Http\Controllers;

use App\Repositories\AgenciaRepositoryEloquent;
use App\Traits\CrudApiTrait;
use App\Http\Requests\AgenciaRequest;

class AgenciaController extends Controller
{

    use CrudApiTrait;

    protected $repository;

    public function __construct(AgenciaRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function store(AgenciaRequest $request)
    {
        $result = $this->repository->create($request->all());
        return response()->json($result);
    }

    public function update(AgenciaRequest $request, $id)
    {
        $result = $this->repository->find($id);
        $result->update($request->all());
        return response()->json($result);
    }
}
