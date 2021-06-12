<?php


namespace App\CartaoCredito;


class Bin
{
    private string $numeroCartao;

    public function __construct(string $numeroCartao)
    {
        $this->numeroCartao = $numeroCartao;
    }

    public function isVisa(): bool
    {
        return $this->findBandeira()->isVisa();
    }

    public function isMasterCard(): bool
    {
        return $this->findBandeira()->isMasterCard();
    }

    public function isDiners(): bool
    {
        return $this->findBandeira()->isDiners();
    }

    public function isElo(): bool
    {
        return $this->findBandeira()->isElo();
    }

    public function isAmex(): bool
    {
        return $this->findBandeira()->isAmex();
    }

    public function isDiscover(): bool
    {
        return $this->findBandeira()->isDiscover();
    }

    public function isAura(): bool
    {
        return $this->findBandeira()->isAura();
    }

    public function isJcb(): bool
    {
        return $this->findBandeira()->isJcb();
    }

    public function isHipercard(): bool
    {
        return $this->findBandeira()->isHipercard();
    }

    public function isNull(): bool
    {
        return $this->findBandeira()->isNull();
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
                if ($this->verificarBinIgualPrimeirosDigitos($bin)) {
                    if (!$bandeiraCartao['bin'] || strlen($bin)>strlen($bandeiraCartao['bin'])) {
                        $bandeiraCartao['bin'] = $bin;
                        $bandeiraCartao['bandeira'] = new Bandeira($bandeira);
                    }
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