<?php

namespace App\Services;

use App\Entities\Conta;
use Exception;
use Illuminate\Support\Facades\DB;

class ContaService {

    private $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function depositar(float $valor)
    {
        DB::transaction(function () use ($valor)
        {
            $this->verificarValorMenorQueZero($valor);
            $this->conta->saldo += $valor;
            $this->conta->save();
        });

    }

    public function sacar(float $valor)
    {
        DB::transaction(function () use ($valor)
        {
            $this->verificarValorMenorQueZero($valor);
            $this->verificarSaldo($valor);
            $this->conta->saldo -= $valor;
            $this->conta->save();
        });
    }

    public function consultaSaldo()
    {
        return $this->conta->saldo;
    }

    private function verificarSaldo(float $valor)
    {
        // Verifica se existe saldo suficiente para o saque.
        if ($this->conta->saldo == 0) {
            throw new Exception('Saldo insuficiente!');
         // Verifica se o valor informado para o saque é maior que o saldo existente.
        } else if ($valor > $this->conta->saldo) {
            throw new Exception('Saldo insuficiente para saque com esse valor informado!');
        }

    }

    private function verificarValorMenorQueZero(float $valor)
    {
        if ($valor <= 0) {
            throw new Exception('O valor informado precisa ser maior do que zero!');
        }
    }

}
