<p align="center">
 <img width="250" src="https://i.imgur.com/x9gfv2e.png"/>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D"/>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/Digital Ocean-0080FF?style=for-the-badge&logo=digitalocean&logoColor=white"/>
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white">
  <img src="https://img.shields.io/badge/TypeScript-007ACC?style=for-the-badge&logo=typescript&logoColor=white">
</p>

> Status do Projeto: :heavy_check_mark: (concluido)

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

## Descrição do projeto 

<p align="justify">
  Serviço de movimentação do estoque de produtos
</p>

## Funcionalidades

:heavy_check_mark: Criação de produto

:heavy_check_mark: Movimentar estoque do produto

:heavy_check_mark: Listagem de histórico do movimento de estoque do produto

:heavy_check_mark: Listagem de histórico do movimento de estoque de todos os produtos

## Deploy da Aplicação :dash:

> Link do deploy da aplicação: https://app-ce4b9bea.tk

## Pré-requisitos

:warning: [PHP:^7.4](https://www.php.net/releases/7_4_0.php)

:warning: [Composer](https://getcomposer.org/download/)

:warning: [Node:^14](https://nodejs.org/en/download/)

:warning: [MySQL](https://hub.docker.com/_/mysql)


## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
git clone https://github.com/Tharlei/app-ce4b9bea
```

Ainda no terminal, entre na pasta:

```
cd app-ce4b9bea
```

Instale as dependências PHP:

```
composer install
```

Copie .env.example e preencha .env:

```
cp .env.example .env
```

Gerar a chave do projeto:

```
php artisan key:generate
```

Execute as migrations:

```
php artisan migrate
```

De permissão as pastas:

```
sudo chgrp -R www-data storage bootstrap/cache && sudo chmod -R ug+rwx storage bootstrap/cache
```

Instale as dependências Javascript:

```
npm i
```

Compile os assets:

```
npm run prod
```

Por fim, execute o projeto:

```
php artisan serve
```

## Linguagens, dependências e libs utilizadas :books:

- [Clean Architecture](https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html)
- [PHP 7.4](https://www.php.net/)
- [Laravel 8.x](https://laravel.com/docs/8.x)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vue.JS](https://vuejs.org/)
- [Typescript](https://www.typescriptlang.org/)

## Desenvolvedor :octocat:

[<img src="https://avatars2.githubusercontent.com/u/32899049?s=460&u=946f73939bb511fa8ae40ed80764cc4dbffe359f&v=4" width=115><br><sub>Tharlei Aleixo</sub>](https://github.com/Tharlei)


## Licença 

The [MIT License]() (MIT)

Copyright :copyright: 2022 - app-ce4b9bea
