# Building Management System

Este projeto é uma aplicação Laravel que gerencia prédios e suas tarefas associadas, com comentários relacionados a
essas tarefas. O sistema permite listar prédios, tarefas, e comentários associados, com funcionalidades de
relacionamento entre os modelos `Building`, `Task` e `Comment`. Ele é projetado para fins de gerenciamento e controle de
status de tarefas dentro de uma organização.

## Funcionalidades

- **Listagem de Prédios**: Exibe todos os prédios cadastrados no sistema.
- **Tarefas**: Cada prédio pode ter várias tarefas associadas.
- **Comentários**: As tarefas podem ter comentários, e cada comentário é associado a um usuário.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação principal.
- **Laravel**: Framework PHP para desenvolvimento de aplicações web.
- **Faker**: Biblioteca para geração de dados falsos.
- **MySQL**: Banco de dados relacional utilizado para armazenar os dados.
- **Factory do Laravel**: Usado para criar dados fictícios de forma eficiente durante os testes.

## Pré-requisitos

Antes de começar, você precisa ter o seguinte instalado:

- PHP >= 8.0
- Composer
- Node.js (se você precisar trabalhar com o frontend)
- MySQL ou outro banco de dados compatível
- Docker (opcional, para containerização do ambiente de desenvolvimento)

## Instalação

### Passo 1: Clone o repositório

Clone o repositório do GitHub para sua máquina local:

```bash
git clone https://github.com/juniorfn22/proprli-test
cd proprli-test
```

### Passo 2: Instale as dependências

Instale as dependências do projeto utilizando o Composer:

```bash
composer install
```

### Passo 3: Configure o .env

Copie o arquivo .env.example para um novo arquivo .env:

```bash
cp .env.example .env
```

Em seguida, configure as variáveis de ambiente no arquivo .env, incluindo as configurações de banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=building_management
DB_USERNAME=root
DB_PASSWORD=
```

### Passo 4: Gere a chave de aplicação

Execute o comando para gerar a chave de aplicação do Laravel:

```bash
php artisan key:generate
```

### Passo 5: Execute as migrations

Execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

### Passo 6: (Opcional) Rodar as fábricas de dados

Se você precisar de dados de exemplo, execute as fábricas para preencher o banco com alguns prédios, tarefas e
comentários:

```bash
php artisan db:seed
```

### Passo 7: Rodar o servidor de desenvolvimento

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

Agora, você pode acessar a aplicação no navegador em http://localhost:8000.

### Estrutura do Projeto
#### Diretórios Importantes

* app/Models: Contém os modelos Building, Task e Comment.
* app/Factories: Contém as fábricas de dados (BuildingFactory, TaskFactory, CommentFactory).
* app/Http/Controllers: Controladores responsáveis pelas rotas API para listar prédios e seus relacionamentos.
* database/migrations: Arquivos de migração para a criação das tabelas no banco de dados.

### Endpoint / SWAGGER

A API oferece uma rota para listar todos os endpoint da aplicação:

```http
GET /api/documentation
```
Ela retorna uma lista com todos os endpoints disponíveis, incluindo informações sobre os parâmetros e respostas.

### Relacionamentos

*   Prédio - Tarefas: Um prédio pode ter várias tarefas associadas.
* Tarefa - Comentários: Cada tarefa pode ter vários comentários.
* Comentário - Usuário: Cada comentário é feito por um usuário, que é gerado automaticamente durante a criação dos dados
de teste.

### Testes
O projeto inclui testes para verificar a funcionalidade de listagem de prédios com suas tarefas e comentários
associados. Para rodar os testes, execute:

```bash
php artisan test
```

Isso executará os testes no diretório tests/Feature.
PS: Os testes foram feitos com base nos dados fictícios gerados pelas fábricas.
PS: Ao executar os testes, o Laravel limpa o banco de dados.
