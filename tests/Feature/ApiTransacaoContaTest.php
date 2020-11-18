<?php

namespace Tests\Feature;

use App\Entities\Conta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTransacaoContaTest extends TestCase
{
    use RefreshDatabase;

    public function testConsultaSaldo()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'saldo' => $conta->saldo
        ];
        $response = $this->getJson('api/v1/conta/saldo?id=' . $conta->id);
        $response->assertStatus(200)->assertJson($data);

    }

    public function testSaque()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '15,25',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/sacar/' . $conta->id, $data);
        $response->assertStatus(200);

    }

    public function testSaqueValorAcimaDoSaldo()
    {
        // O valor do saldo para testes na ContaFactory foi 30,00.
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '45,00',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/sacar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testSaqueValorZerado()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '0,00',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/sacar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testSaqueValorNegativo()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '-20,00',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/sacar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testSaqueValorMalFormatado()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '15.6', // valor com ponto não é permitido.
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/sacar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testDeposito()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '15,25',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/depositar/' . $conta->id, $data);
        $response->assertStatus(200);

    }

    public function testDepositoValorZerado()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '0,00',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/depositar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testDepositoValorMalFormatado()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '15.6', // valor com ponto não é permitido.
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/depositar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

    public function testDepositoValorNegativo()
    {
        $conta = factory(Conta::class)->create();
        $data = [
            'valor' => '-60,00',
            'id' => $conta->id
        ];
        $response = $this->putJson('api/v1/conta/depositar/' . $conta->id, $data);
        $response->assertStatus(422);

    }

}
