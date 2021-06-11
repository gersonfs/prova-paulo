<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;
use App\ValidarRotaService;

class ValidarRotaServiceTest extends TestCase
{

    public function testIsRotaValidaValidas()
    {
        $service = new ValidarRotaService();
        $this->assertTrue($service->isValida(['RS', 'RS']));
        $this->assertTrue($service->isValida(['RS', 'SC']));
        $this->assertTrue($service->isValida(['RS', 'SC', 'PR', 'SP']));
        $this->assertTrue($service->isValida(['RS', 'SC', 'RS']));
        $this->assertTrue($service->isValida(['AM', 'MT', 'GO']));
        $this->assertTrue($service->isValida(['PR', 'SC', 'RS']));
    }

    public function testIsRotaValidaInvalidas()
    {
        $service = new ValidarRotaService();
        $this->assertFalse($service->isValida([]));
        $this->assertFalse($service->isValida(['RS']));
        $this->assertFalse($service->isValida(['RS', 'PR', 'SP', 'MG']));
        $this->assertFalse($service->isValida(['PR', 'RS']));
    }

}
