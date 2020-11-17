<?php

namespace App\Http\Controllers;

use App\Repositories\ContaRepositoryEloquent;
use App\Traits\CrudApiTrait;
use App\Http\Requests\ContaRequest;

class ContaController extends Controller
{
    use CrudApiTrait;

    protected $repository;

    public function __construct(ContaRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function store(ContaRequest $request)
    {
        $result = $this->repository->create($request->all());
        return response()->json($result);
    }

    public function update(ContaRequest $request, $id)
    {
        $result = $this->repository->find($id);
        $result->update($request->all());
        return response()->json($result);
    }
}
