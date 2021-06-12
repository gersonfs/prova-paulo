<?php


namespace App\CartaoCredito;


use BadMethodCallException;

class Bin
{
    private string $numeroCartao;

    public function __construct(string $numeroCartao)
    {
        $this->numeroCartao = $numeroCartao;
    }

    public function __call($name, $arguments)
    {
        if (strpos('is', $name) !== 0) {
            throw new BadMethodCallException("");
        }
        return $this->findBandeira()->$name();
    }

    public function findBandeira(): Bandeira
    {
        $tabelaPrimeirosDigitos = TabelaBins::getTabela();
        $bandeiraCartao = [
            'bin' => null,
            'bandeira' => new Bandeira(Bandeira::NULL)
        ];
        foreach ($tabelaPrimeirosDigitos as $bandeira => $bins) {
            foreach ($bins as $bin) {
                if ($this->verificarBinIgualPrimeirosDigitos($bin)
                    && (!$bandeiraCartao['bin'] || strlen($bin)>strlen($bandeiraCartao['bin']))
                ) {
                    $bandeiraCartao['bin'] = $bin;
                    $bandeiraCartao['bandeira'] = new Bandeira($bandeira);
                }
            }
        }
        return $bandeiraCartao['bandeira'];
    }

    private function verificarBinIgualPrimeirosDigitos(string $primeirosDigitos): bool
    {
        $positionOfCodeInCardNumber = strpos($this->numeroCartao, $primeirosDigitos);
        return ($positionOfCodeInCardNumber !== false && $positionOfCodeInCardNumber === 0);
    }
}