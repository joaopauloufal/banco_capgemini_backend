<?php

namespace Tests\Feature;

use App\Entities\Conta;
use Tests\ApiCrudTestCase;

class ApiContaTest extends ApiCrudTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Conta::class;
        $this->endpoint = 'contas';
    }
}
