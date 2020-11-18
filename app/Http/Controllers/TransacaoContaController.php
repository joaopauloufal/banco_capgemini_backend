<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaSaldoRequest;
use App\Http\Requests\TransacaoContaRequest;
use App\Repositories\ContaRepositoryEloquent;
use App\Services\ContaService;
use App\Services\UtilsService;
use Exception;

class TransacaoContaController extends Controller
{
    private $contaService;
    protected $repository;

    public function __construct(ContaRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function consultaSaldo(ConsultaSaldoRequest $request) {
        $conta = $this->repository->find($request->id);
        $this->contaService = new ContaService($conta);
        $saldo = $this->contaService->consultaSaldo();
        return response()->json(['saldo'=>$saldo]);
    }

    public function depositar(TransacaoContaRequest $request) {
        $valorFormatado = $this->buscarContaAndFormatarValorParaMoeda($request);
        try {
            $this->contaService->depositar($valorFormatado);
            return response()->json(['message'=>'Depósito realizado com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message'=>$e->getMessage()], 422);
        }
    }

    public function sacar(TransacaoContaRequest $request) {
        $valorFormatado = $this->buscarContaAndFormatarValorParaMoeda($request);
        try {
            $this->contaService->sacar($valorFormatado);
            return response()->json(['message'=>'Saque realizado com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message'=>$e->getMessage()], 422);
        }
    }

    private function buscarContaAndFormatarValorParaMoeda(TransacaoContaRequest $request) {
        $conta = $this->repository->find($request->id);
        $this->contaService = new ContaService($conta);
        return UtilsService::converterMoedaParaFloat($request->valor);
    }
}
