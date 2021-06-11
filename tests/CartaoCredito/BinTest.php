<?php

namespace App\Test\CartaoCredito;

use App\CartaoCredito\Bandeira;
use App\CartaoCredito\Bin;
use App\CartaoCredito\TabelaBins;
use PHPUnit\Framework\TestCase;

class BinTest extends TestCase
{

    public function test_find_bandeira_elo()
    {
        $cartaoElo = '4514161234567890';
        $bin = new Bin($cartaoElo);
        $this->assertEquals(Bandeira::buildElo(), $bin->findBandeira());
    }

    public function test_find_bandeira_visa()
    {
        $cartaoVisa = '4111111145551142';
        $bin = new Bin($cartaoVisa);
        $this->assertEquals(Bandeira::buildVisa(), $bin->findBandeira());
    }

    public function test_find_bandeira_aura(): void
    {
        $cartaoAura = '5012345678901234';
        $bin = new Bin($cartaoAura);
        $this->assertEquals(Bandeira::buildAura(), $bin->findBandeira());
    }

    public function test_getTabela_nao_alterar_esse_teste()
    {
        $tabelaEsperada = [
            Bandeira::VISA => ['4'],
            Bandeira::MASTERCARD => ['5', '2'],
            Bandeira::DINERS => ['301'],
            Bandeira::ELO => ['636368', '636369', '438935', '504175', '451416', '636297', '5067', '4576', '4011', '506699'],
            Bandeira::AMEX => ['34', '37'],
            Bandeira::DISCOVER => ['6011', '622', '64', '65'],
            Bandeira::AURA => ['50'],
            Bandeira::JCB => ['35'],
            Bandeira::HIPERCARD => ['38', '60'],
        ];

        $this->assertEquals($tabelaEsperada, TabelaBins::getTabela());
    }
}
