<?php

namespace Tests\Feature;

use App\Entities\Agencia;
use Tests\ApiCrudTestCase;

class ApiAgenciaTest extends ApiCrudTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Agencia::class;
        $this->endpoint = 'agencias';
    }
}
