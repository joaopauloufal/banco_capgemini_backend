<?php

namespace Tests\Feature;

use App\Services\UtilsService;
use Tests\TestCase;

class UtilsServiceTest extends TestCase
{

    public function testConverterMoedaParaFloatMesmoTipo()
    {
        $valorString = '5.000,20';
        $valorRetornado = UtilsService::converterMoedaParaFloat($valorString);

        $this->assertSame(5000.20, $valorRetornado);
    }
}
