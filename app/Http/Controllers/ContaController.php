<?php

namespace App\Http\Controllers;

use App\Repositories\ContaRepositoryEloquent;
use App\Traits\CrudApiTrait;
use App\Http\Requests\ContaRequest;
use App\Services\UtilsService;

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
        $data = $request->all();
        $data['saldo'] = UtilsService::converterMoneyToFloat($data['saldo']);
        $result = $this->repository->create($data);
        return response()->json($result);
    }

    public function update(ContaRequest $request, $id)
    {
        $result = $this->repository->find($id);
        $data = $request->all();
        $data['saldo'] = UtilsService::converterMoneyToFloat($data['saldo']);
        $result->update($data);
        return response()->json($result);
    }
}
