<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepositoryEloquent;
use App\Traits\CrudApiTrait;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    use CrudApiTrait;

    protected $repository;
    public function __construct(ClienteRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function store(ClienteRequest $request)
    {
        $result = $this->repository->create($request->all());
        return response()->json($result);
    }

    public function update(ClienteRequest $request, $id)
    {
        $result = $this->repository->find($id);
        $result->update($request->all());
        return response()->json($result);
    }

}
