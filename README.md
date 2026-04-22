# EasyBus - API

O **EasyBus** é uma plataforma web desenvolvida para facilitar o acesso prático a informações sobre viagens de ônibus intermunicipais. O projeto visa unificar e simplificar a busca por trajetos, horários e preços, melhorando a rotina de passageiros que dependem do transporte público.

Este repositório contém a **API** da aplicação, construída integralmente com o framework Laravel.

## Funcionalidades

O sistema foi modelado para atender a três perfis de usuários distintos:

*   **Administrador:** Responsável pelo gerenciamento de alto nível, incluindo o cadastro e exclusão de empresas de transporte e a criação de contas para funcionários.
*   **Funcionário (Empresa):** Gerencia as operações da empresa de transporte à qual está vinculado, sendo responsável por criar e gerenciar linhas (rotas) e incluir viagens detalhadas.
*   **Passageiro:** O usuário final da aplicação, que pode pesquisar por linhas e viagens através de origem ou destino, criar uma conta e salvar suas linhas favoritas para acesso rápido.

## 🛠️ Tecnologias Utilizadas

*   **Framework PHP:** Laravel.
*   **Banco de Dados:** Estrutura relacional gerenciada através do Eloquent ORM.
*   **JWT** tokens para autenticação de usuários.

## ⚙️ Como Executar o Projeto

Como esta é uma aplicação Laravel padrão, siga os passos abaixo para configurá-la localmente:

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/seu-usuario/easybus-laravel.git
    cd easybus-laravel
    ```

2.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

3.  **Configure o arquivo de ambiente:**
    *   Copie o arquivo `.env.example` para `.env`.
    *   Configure as credenciais do seu banco de dados (MySQL/PostgreSQL) no arquivo `.env`.

4.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

5.  **Execute as migrações do banco de dados:**
    *   Este passo criará as tabelas de Empresas, Linhas, Viagens, Usuários e Paradas conforme a modelagem do projeto.
    ```bash
    php artisan migrate
    ```

6.  **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve
    ```
    Acesse a aplicação em: `http://localhost:8000`

## 📊 Estrutura de Dados

A aplicação baseia-se em quatro entidades principais:

*   **Empresas:** Entidades responsáveis pelas rotas e funcionários.
*   **Linhas:** Representam as rotas (ex: Origem x Destino) associadas a uma empresa.
*   **Viagens:** Detalhes específicos como horários de partida/chegada e valor da passagem.
*   **Usuários:** Divididos entre Administradores, Funcionários e Passageiros.

---
*Este projeto foi desenvolvido por **Vitor Gabriel de Souza Lara** como parte de uma Iniciação Científica no Departamento de Ciência da Computação da **Universidade Federal de São João del-Rei (UFSJ)**.*

````
