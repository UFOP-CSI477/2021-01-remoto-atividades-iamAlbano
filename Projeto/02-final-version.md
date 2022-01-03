# **CSI606-2021-01 - Remoto - Trabalho Final - Resultados**
## *Aluna(o): Princesa Leia (Luke Skywalker)*

--------------

<!-- Este documento tem como objetivo apresentar o projeto desenvolvido, considerando o que foi definido na proposta e o produto final. -->

### Resumo

  O trabalho consiste em uma área administrativa para gerenciamento de uma loja, neste sistema é possível cadastrar pessoas tais como clientes, fornecedores e funcionários.         Produtos também podem ser cadastrados e atualizados, além disso, é possível gerenciar as vendas e compras, cadastrando e atualizando seus status.

### 1. Funcionalidades implementadas

    Autenticação, Login e cadastro de usuário.
    
    Aba Pessoas:
    a. Cadastra uma nova pessoa e gerenciar suas informações como nome, cpf, tipo, categoria etc.
    b. Atualizar dados das pessoas cadastradas
    c. Excluir pessoas que não estejam relacionadas a nenhuma compra ou venda.
    d. Filtrar a tabela de pessoas cadastradas, pesquisando por nome, tipo etc.
    
    Aba Produtos:
    a. Cadastrar novos produtos no estoque virtual
    b. Atualizar dados de produtos.
    c. Excluir produtos
    d. Adicionar e remover categorias de produtos.
    
    Aba compras:
    a. Cadastrar compras realizadas pela loja e escolher o fornecedor, produtos adquiridos, data de compra e entrega etc.
    b  Visualizar e atualizar status de compra.
    c. Excluir uma compra.
    
    Aba vendas:
    a. Cadastrar vendas da loja e escolher o cliente, produtos vendidos, data de compra e entrega etc.
    b  Visualizar e atualizar status de venda.
    c. Excluir uma venda.
    
    
  
### 2. Funcionalidades previstas e não implementadas
    Alterar informações da loja: Não foram implementadas informações da loja como nome, cnpj e tipo de mercado pois faltou tempo.
    Adicionar imagem dos produtos: Não é possível adicionar imagens aos produtos pois segui as aulas para implementar o sistema e como não houve uma aula sobre manipulação de      imagens, acabou que não implementei por falta de tempo de pesquisar e aprender por outra forma

### 3. Outras funcionalidades implementadas
<!-- Descrever as funcionalidades implementas além daquelas que foram previstas, caso se aplique.  -->

### 4. Principais desafios e dificuldades
Grande complexidade do sistema com diversas implementações que necessitam de depêndencia uma das outras.

### 5. Instruções para instalação e execução
    Para instalar e executar o sistema em seu computador, será necessário ter instalado: Composer, Laravel, node, npm e um banco de dados de sua preferência.
    Passo a passo:
    1. Após clonar ou baixar os arquivos na sua máquina, acesse a pasta do projeto pelo terminal do seu computador (pode ser pelo VSCode).
    2. Configure o arquivo .env com os dados do seu banco de dados (nome, host, usuário etc)
    3. Execute as migrations com o comando php artisan migrate.
    4. Insira o comando npm install para instalar dependências necessárias para o jetstream
    5. Com npm instalado, insira o comando npm run dev.
    6. Utilize o comando php artisan serve para abrir a aplicação na porta 8000

### 6. Referências
<!-- Referências podem ser incluídas, caso necessário. Utilize o padrão ABNT. -->

