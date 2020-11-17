<?php

namespace App\Services;

use App\Entities\Conta;

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

}
