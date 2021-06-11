<?php


namespace App;


class LeitorArquivo
{

    public function __construct(string $caminhoArquivo)
    {
        if(!file_exists($caminhoArquivo)) {
            throw new \InvalidArgumentException("O caminho do arquivo é inválido!");
        }

    }

    public function getColunas(): array
    {
        return [];
    }

    public function getValorLinhaColuna(int $numeroLinha, string $nomeColuna): string
    {
        return "";
    }
}