<?php


namespace App;


/**
 * Class ValidarRotaService
 * @package App
 */
class ValidarRotaService
{
    /**
     * Estados que fazem fronteira com um estado
     * @var string[][]
     */
    protected $fronteiraPorEstado = [
        'RO' => [
            'AC', 'AM', 'MT'
        ],
        'AC' => [
            'AM', 'RO'
        ],
        'AM' => [
            'AC', 'RR', 'PA', 'MT', 'RO'
        ],
        'RR' => [
            'AM', 'PA'
        ],
        'PA' => [
            'AP', 'AM', 'MA', 'RR', 'MA', 'TO', 'MT'
        ],
        'AP' => [
            'PA'
        ],
        'TO' => [
            'PA', 'MA', 'PI', 'BA', 'GO', 'MT'
        ],
        'MA' => [
            'PA', 'PI', 'TO'
        ],
        'PI' => [
            'MA', 'TO', 'BA', 'PE', 'CE'
        ],
        'CE' => [
            'PI', 'PE', 'PB', 'RN'
        ],
        'RN' => [
            'PB', 'CE'
        ],
        'PB' => [
            'CE', 'PE', 'RN'
        ],
        'PE' => [
            'CE', 'PI', 'PB', 'AL', 'BA'
        ],
        'AL' => [
            'PE', 'SE', 'BA'
        ],
        'SE' => [
            'AL', 'BA'
        ],
        'BA' => [
            'SE', 'AL', 'PE', 'PI', 'TO', 'GO', 'MG', 'ES'
        ],
        'MG' => [
            'GO', 'BA', 'ES', 'RJ', 'SP', 'MS', 'DF'
        ],
        'ES' => [
            'BA', 'MG', 'RJ'
        ],
        'RJ' => [
            'ES', 'MG', 'SP'
        ],
        'SP' => [
            'RJ', 'MG', 'MS', 'PR'
        ],
        'PR' => [
            'MS', 'SC', 'SP'
        ],
        'SC' => [
            'PR', 'RS'
        ],
        'RS' => [
            'SC'
        ],
        'MS' => [
            'GO', 'MG', 'MT', 'SP', 'PR'
        ],
        'MT' => [
            'AM', 'PA', 'RO', 'TO', 'GO', 'MS'
        ],
        'GO' => [
            'MT', 'TO', 'BA', 'MG', 'MS', 'DF'
        ],
        'DF' => [
            'GO', 'MG'
        ]
    ];

    /**
     * @param array $siglasEstados
     * @return bool
     */
    public function isValida(array $siglasEstados): bool
    {
        if (count($siglasEstados) < 2) {
            return false;
        }

        foreach($siglasEstados as $key => $estado) {
            if ($key == 0) {
                continue;
            }
            if ($siglasEstados[$key-1] != $estado
                && (!isset($this->fronteiraPorEstado[$estado])
                || !in_array($siglasEstados[$key-1], $this->fronteiraPorEstado[$estado]))
            ) {
                return false;
            }
        }
        return true;
    }
}