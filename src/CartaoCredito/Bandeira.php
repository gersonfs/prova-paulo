<?php


namespace App\CartaoCredito;


class Bandeira
{
    public const VISA = 'VISA';
    public const MASTERCARD = 'MASTERCARD';
    public const DINERS = 'DINERS';
    public const ELO = 'ELO';
    public const AMEX = 'AMEX';
    public const DISCOVER = 'DISCOVER';
    public const AURA = 'AURA';
    public const JCB = 'JCB';
    public const HIPERCARD = 'HIPERCARD';
    public const NULL = 'NULL';

    private string $codigo;

    public function __construct(string $codigo)
    {
        $this->codigo = $codigo;
    }

    public static function buildVisa(): self
    {
        return new self(self::VISA);
    }

    public static function buildMastercard(): self
    {
        return new self(self::MASTERCARD);
    }

    public static function buildElo(): self
    {
        return new self(self::ELO);
    }

    public static function buildAura(): self
    {
        return new self(self::AURA);
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function isVisa(): bool
    {
        return $this->getCodigo() == self::VISA;
    }

    public function isMasterCard(): bool
    {
        return $this->getCodigo() == self::MASTERCARD;
    }

    public function isDiners(): bool
    {
        return $this->getCodigo() == self::DINERS;
    }

    public function isElo(): bool
    {
        return $this->getCodigo() == self::ELO;
    }

    public function isAmex(): bool
    {
        return $this->getCodigo() == self::AMEX;
    }

    public function isDiscover(): bool
    {
        return $this->getCodigo() == self::DISCOVER;
    }

    public function isAura(): bool
    {
        return $this->getCodigo() == self::AURA;
    }

    public function isJcb(): bool
    {
        return $this->getCodigo() == self::JCB;
    }

    public function isHipercard(): bool
    {
        return $this->getCodigo() == self::HIPERCARD;
    }

    public function isNull(): bool
    {
        return $this->getCodigo() == self::NULL;
    }
}