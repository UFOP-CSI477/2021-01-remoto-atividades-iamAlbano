# **CSI606-2021-01 - Remoto - Trabalho Final**

## Aluno: Guilherme Lage Albano (Darth Vader)

--------------

<!-- Descrever um resumo sobre o trabalho. -->

### Resumo

  Área administrativa de produtos, onde um usuário administrador pode se cadastrar e cadastrar outros administradores. Estes usuários serão capazes de adicionar e remover produtos de um catálogo, podendo editar informações como fotos, nome preço e descrição do produto. Além disso será possível visualizar quantidade disponível em estoque e quantidade vendida de cada produto.

<!-- Apresentar o tema. -->
### 1. Tema

  O trabalho final tem como tema o desenvolvimento de uma área administrativa para gerenciamento de uma loja.

<!-- Descrever e limitar o escopo da aplicação. -->
### 2. Escopo

  Este projeto terá as seguintes funcionalidades...
  
  Backlog do sistema: https://docs.google.com/document/d/1rVsMkcLIuqateU6Zs3g6Z6uraFCduvXHVsyRcUIfPEM/edit?usp=sharing

<!-- Apresentar restrições de funcionalidades e de escopo. -->
### 3. Restrições

  Restrições Neste trabalho não serão considerados funções para venda real de produtos como cadastro de cartão de crédito, boleto ou qualquer forma de pagamento.

<!-- Construir alguns protótipos para a aplicação, disponibilizá-los no Github e descrever o que foi considerado. //-->
### 4. Protótipo

  Protótipo Protótipos para as páginas de cadastro de administrador, configurações da loja e contato e gerenciamento de produtos foram elaborados no figma, e podem ser         encontrados em https://www.figma.com/file/b7OIbHJoifxGTn3mWP2PIy/Projeto-Loja?node-id=0%3A1
  
### 5. Apresentação
    Link do vídeo https://www.youtube.com/watch?v=Tm7aE4SpgiE
    
    
    
# **CSI606-2021-01 - Remoto - Trabalho Final - Resultados**
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
