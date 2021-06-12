<?php


namespace App;


class LeitorArquivo
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var false|string[]
     */
    private $colunas;

    public function __construct(string $caminhoArquivo)
    {
        if(!file_exists($caminhoArquivo)) {
            throw new \InvalidArgumentException("O caminho do arquivo é inválido!");
        }
        $linhas = explode("\n", file_get_contents($caminhoArquivo));
        $this->colunas = explode("\t", $linhas[0]);
        array_shift($linhas);
        $this->data = array_map(
            function ($linha) {
                return array_combine($this->colunas, explode("\t", $linha));
            },
            $linhas
        );

    }

    public function getColunas(): array
    {
        return $this->colunas ?? [];
    }

    public function getValorLinhaColuna(int $numeroLinha, string $nomeColuna): string
    {
        if (!in_array($nomeColuna, $this->colunas)) {
            throw new \InvalidArgumentException("Nome de coluna inválido!");
        }
        if (!isset($this->data[$numeroLinha])) {
            throw new \InvalidArgumentException("Número de linha inexistente!");
        }
        return $this->data[$numeroLinha][$nomeColuna];
    }
}