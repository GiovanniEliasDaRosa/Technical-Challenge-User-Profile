# Technical Challenge User Profile

[![en](https://img.shields.io/badge/lang-en-red.svg)](/README.md)

## Lista de conteúdos

1. [Visão geral](#visão+geral)
2. [Tecnologias Usadas](#tecnologias-usadas)
3. [Pré-requisitos](#pré--requisitos)
4. [Passos para Instalação](#passos-para-instalação)
5. [Rodando a Aplicação](#rodando-a-aplicação)
6. [Solucionando Problemas](#solucionando-problemas)

## Visão geral

Este projeto foi desenvolvido com Laravel e tem como foco registrar usuários e permitir que encontrem outros usuários.

## Tecnologias Usadas

- **Laravel**: _Framework_ PHP para desenvolvimento de aplicações web.
- **MySQL**: Sistema de gerenciamento de banco de dados relacional.
- **Laravel Mix**: um compilador de _assets_ que usa Webpack. [Saiba Mais](https://laravel-mix.com/).

## Pré-requisitos

Antes de rodar a aplicação você precisa instalar o seguinte:

- **XAMPP**: Vem com PHP e MySQL. Você pode usar outras aplicações se preferir, mas você vai precisar de PHP e MySQL.
- **Composer**: Um gerenciador de dependências para PHP
- **npm**: Necessário para gerenciar pacotes JavaScript.
- **laravel-mix**: Laravel Mix: Necessário para _compilar assets_ CSS e JavaScript.

## Passos para Instalação

### 1. Instalar XAMPP

Baixe e instale PHP e MySQL com [XAMPP](https://www.apachefriends.org/pt_br/index.html).

### 2. Inicie o server XAMPP

- Abra o Painel de Controle do XAMPP.
- Clique no botão 'Start' perto do **MySQL**.
- (Opcional) Inicie o **Apache** para acessar o phpMyAdmin com `http://127.0.0.1/phpmyadmin`.
  > Isso é opcional, e permite que veja o banco de dados pelo phpMyAdmin. Você também pode usar outras ferramentas de banco de dados como TablePlus, HeidiSQL e muitas outras.

### 3. Baixe esse Repositório

Baixe esse repositório clicando no botão `<> Code` e selecionando `Download ZIP`.

### 4. Baixar dependências Laravel

Navegue para a pasta raiz do projeto no seu terminal e rode:

```bash
composer install
```

### 5. Instalar pacotes Node

No mesmo terminal, rode:

```bash
npm install
```

### 6. Configurar variáveis de ambiente

Duplique o arquivo `.env.example` e renomeie para `.env`

### 7. Crie o Banco de Dados

Rode o seguinte comando para criar o banco de dados, gerar as tabelas e preenchê-las com dados.

```bash
php artisan migrate --seed
```

### 8. Gerar a Chave da Aplicação

```bash
php artisan key:generate
```

### 9. Linkar Armazenamento

Crie o link de armazenamento para tornar as imagens enviadas acessíveis.

```bash
php artisan storage:link
```

### 10. Compilar os Assets

Compile os arquivos CSS e JS

```bash
npm run production
```

No desenvolvimento, use:

```bash
npm run hot
```

### 11. Inicie o servidor local

Rode o seguinte comando para iniciar o servidor local.

```bash
php artisan serve
```

Acesse a aplicação no `http://127.0.0.1:8000`.

**Observação**: Deixe o terminal aberto enquanto o servidor estiver rodando. Se você fechar o terminal, o servidor será desligado.
**Se você fechar o terminal**: Rode este passo novamente e verifique se o serviço XAMPP está em execução.

#### Opções de Host e Porta

- `--host[=HOST]` => Define o endereço **host** onde a aplicação será executada (padrão: `127.0.0.1`).
- `--port[=PORT]` => Define a **porta** onde a aplicação será executada (padrão: `8000`).

Por exemplo, para executar o servidor em um host ou porta diferentes:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Assim, sua aplicação será acessível em http://127.0.0.1:8800.

## Solucionando Problemas

- Se você encontrar problemas, tenha certeza que o serviço XAPP esteja rodando.
- Verifique por quaisquer erros no terminal.
