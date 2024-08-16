## Logcomex Technical Test

Este projeto foi desenvolvido como teste técnico para a Logcomex

## Sobre o repositório

Este repositório consiste em exemplo de código a partir de um Live Coding, ao qual foi necessário consumir uma API de [Pokemons](https://pokeapi.co/docs/v2#pokemon), e está dividido da seguinte maneira:

- [Backend](https://github.com/marcioal1991/logcomex/tree/main/backend)
- [Frontend](https://github.com/marcioal1991/logcomex/tree/main/frontend)
- [Docker](https://github.com/marcioal1991/logcomex/tree/main/docker)

### Backend
O backend utiliza [Laravel 11](https://laravel.com/docs/11.x/installation) and [PHP 8.3](https://www.php.net/releases/8.3/en.php)

### Frontend
O frontend foi construído com [Vue 3](https://vuejs.org/) e [Bulma CSS Framework](https://bulma.io/) (Framework CSS standalone). E os seguintes pacotes inclusos:

- [Axios](https://axios-http.com/)

## Ambiente de desenvolvimento

O ambiente de desenvolvimento utiliza contêineres Docker para executar a aplicação e está estruturado da seguinte forma:

The development environment uses Docker containers to run the application and is structured as follows:
- Uma rede privada chamada ```logcomex```
  - Container com a aplicação Laravel
  - Container com a aplicação Vue
  - Container com uma instância de Redis
  - Container contendo PostgreSQL database

Cada contêiner possui um IP interno do Docker, e apenas as portas necessárias estão expostas (a porta do banco de dados está exposta para ferramentas de desenvolvimento, mas pode ser fechada para a aplicação).


### Passos para execução do projeto

Será necessário instalar as dependências do node e php (Laravel) diretamente pelo host (ou criar um container temporário para executar)

```bash 
    cd backend && composer install
```

```bash 
    cd frontend && npm install
```

Após instalar as dependências, basta rodar o docker compose

```bash 
    docker compose up
```
É necessário rodar as migrations com o seguinte comando:
```bash
    docker exec -it laravel bash -c "php artisan migrate"
```

Agora será necessário importar todos os dados dos pokemons pela API, para isso basta executar o comando a seguir e aguardar:
```bash
    docker exec -it laravel bash -c "php artisan fetch-and-store-pokemons"
```

A aplicação em Vue está disponível em [http://localhost:5173](http://localhost:5173)

