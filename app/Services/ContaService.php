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
        /**
         * Incrementa o saldo e persiste no banco de dados.
         *
         * @param  float  $valor
         * @return void
         */
        DB::transaction(function () use ($valor)
        {
            $this->verificaValorInformadoMenorQueZero($valor);
            $this->conta->saldo = ((float) $this->conta->saldo) + $valor;
            $this->conta->save();
        });

    }

    public function sacar(float $valor)
    {
        /**
         * Decrementa o saldo e persiste no banco de dados.
         *
         * @param  float  $valor
         * @return void
         */
        DB::transaction(function () use ($valor)
        {
            $this->verificaValorInformadoMenorQueZero($valor);
            $this->verificaSaldoInsuficienteEValorMaiorQueSaldo($valor);
            $this->conta->saldo =  ((float) $this->conta->saldo) - $valor;
            $this->conta->save();

        });
    }

    public function consultaSaldo()
    {
        /**
         * Retorna o valor do saldo da conta.
         *
         * @param  float  $valor
         * @return void
         */
        return $this->conta->saldo;
    }

    private function verificaSaldoInsuficienteEValorMaiorQueSaldo(float $valor)
    {
        // Verifica se existe saldo suficiente para o saque.
        if ($this->conta->saldo == 0) {
            throw new Exception('Saldo insuficiente!');
         // Verifica se o valor informado para o saque é maior que o saldo existente.
        } else if ($valor > $this->conta->saldo) {
            throw new Exception('Saldo insuficiente para saque com esse valor informado!');
        }

    }

    private function verificaValorInformadoMenorQueZero(float $valor)
    {
        if ($valor <= 0) {
            throw new Exception('O valor informado precisa ser maior do que zero!');
        }
    }

}
