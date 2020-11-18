<?php

namespace Tests\Feature;

use App\Entities\Cliente;
use Tests\ApiCrudTestCase;

class ApiClienteTest extends ApiCrudTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Cliente::class;
        $this->endpoint = 'clientes';
    }
}
