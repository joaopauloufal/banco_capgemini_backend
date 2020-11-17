<?php

namespace App\Services;

use App\Entities\Conta;
use Exception;

class ContaService {

    private $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function depositar(float $valor)
    {
        $this->conta->saldo += $valor;
        $this->conta->save();
    }

    public function sacar(float $valor)
    {
        $this->verificarSaldo($valor);
        $this->conta->saldo -= $valor;
        $this->conta->save();
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

}
