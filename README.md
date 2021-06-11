# Prova para programadores PHP

1 - Você deve fazer um fork desse projeto e fazer os testes PHPUnit passarem implementando o código que está sendo testado.
Comece instalando as dependências:
```bash
composer install
```

2 - Rodar os testes com 
```bash
composer test
```

Quando todos os testes passarem você pode fazer um PR para que eu revise.

## Informações sobre validação de rota
A validação da rota é algo comum em sistemas de MDF-e, onde o cliente deverá informar uma rota válida do veículo entre estados.
Rotas validas são aquelas que:
- Ocorrem dentro do estado. Exemplo: `RS,RS`. Ocorre quando a origem e destino são no mesmo estado.
- Os estados devem ser vizinhos. Por exemplo, a rota `RS,SC,PR` é válida porque RS faz divisa com SC que por sua vez faz divisa com PR. A rota `RS,PR,SP` não é válida pois RS não faz divisa com PR.

## Informações sobre o Leitor de Arquivos

Essa classe deve ser capaz de ler um arquivo e trazer as informações de acordo com o número da linha e nome da coluna. Ela será usada para importar dados de clientes de um sistema de terceiros. Precisamos certificar que a classe funciona conforme os testes.
Existe um arquivo de exemplo em tests/resources.

## Informações sobre a classe App\CartaoCredito\Bin

A classe Bin possui uma lógica muito simplista e por consequência errada que faz com que ela não reconheça corretamente os cartões. Você deve 
melhorar o algoritmo de reconhecimento do cartão sem alterar o conteúdo do método `App\CartaoCredito\TabelaBins::getTabela` 
porque hipoteticamente essa tabela vem de um banco de dados do cliente que você não tem acesso nem permissão para mudar.
As demais classes podem ser alteradas sem problema, desde que o teste passe como está.

Você não deve duplicar a informação dos bins em nenhum outro lugar.

O seu algoritmo deve continuar funcionando mesmo que se adicione mais bins de outras possíveis novas bandeiras. 

Por exemplo:
Foi criada uma nova bandeira chamada ABC com bin 60112. 6011 É o bin da bandeira Discover, mas se for usado 60112 ele
deve reconhecer a bandeira ABC sem ter que alterar nada no algoritmo de reconhecimento das bandeiras, somente na classe
Bandeira.
