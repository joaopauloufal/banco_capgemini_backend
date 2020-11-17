<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositoRequest;
use App\Repositories\ContaRepositoryEloquent;
use App\Services\ContaService;

class TransacaoContaController extends Controller
{
    private $contaService;
    protected $repository;

    public function __construct(ContaRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function depositar(DepositoRequest $request) {

        $conta = $this->repository->find($request->id);
        $this->contaService = new ContaService($conta);
        $valorFormatado = $this->convertMoneyToFloat($request->valor);
        $this->contaService->depositar($valorFormatado);
        return response()->json(['message'=>'Depósito realizado com sucesso!']);

    }

    private function convertMoneyToFloat($valor){
        $val = str_replace(",",".",$valor);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }
}
