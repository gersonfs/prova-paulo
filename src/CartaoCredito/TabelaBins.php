<?php


namespace App\CartaoCredito;


class TabelaBins
{
    public static function getTabela(): array
    {
        return [
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
    }
}
