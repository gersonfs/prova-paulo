<?php

namespace App\Test;

use App\LeitorArquivo;
use PHPUnit\Framework\TestCase;

class LeitorArquivoTest extends TestCase
{

    private LeitorArquivo $leitor;

    public function setUp(): void
    {
        $this->leitor = new LeitorArquivo(__DIR__ . '/resources/Clientes.txt');
    }

    public function testGetColunas()
    {
        $colulnasEsperadas = ['ID', 'Nome', 'CPF'];
        $this->assertEquals($colulnasEsperadas, $this->leitor->getColunas());
    }

    public function testGetValorLinhaColuna()
    {
        $this->assertEquals('10', $this->leitor->getValorLinhaColuna(0, 'ID'));
        $this->assertEquals('Fulano de tal', $this->leitor->getValorLinhaColuna(0, 'Nome'));
        $this->assertEquals('106.734.110-28', $this->leitor->getValorLinhaColuna(0, 'CPF'));
        $this->assertEquals('Beltrano de tal', $this->leitor->getValorLinhaColuna(1, 'Nome'));
        $this->assertEquals('481.771.260-08', $this->leitor->getValorLinhaColuna(2, 'CPF'));
    }

    public function testGetValorLinhaColunaInexistente()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->leitor->getValorLinhaColuna(1, 'ColunaQueNaoExiste');
    }

    public function testGetValorLinhaInexistenteColuna()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->leitor->getValorLinhaColuna(999, 'ID');
    }
}
