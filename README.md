<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Book Worm

## Sobre o projeto 
Gestão de livros, vincula um livro com o seu escritor, criando um cadastro básico para ambos.

## Documentação
Para acessar a documentação da API basta acessar a rota:

/docs

Coleção para o Insomnia e para o Postman na pasta Docs. 

### Rodando o projeto
Caso for a primera execução, execute o comando:
```shell
docker-compose up -d --build
```

Se ja tiver executado o projeto antes, execute o comando:
```shell
docker-compose up -d
```

Para criar o usuário admin@email.com, com a senha administrator utilize o seguinte comando:
```shell
docker exec -it pontue.laravel php artisan db:seed Admin
```

### Testes/QA
Para executar os testes, basta executar:
```shell
docker exec -it pontue.laravel php artisan test
```


### Roadmap
- Preparando o ambiente de desenvolvimento instalando plugins uteis:
  Artisan Pint, PHPInsights.
- Criando sistema de autenticação com o Sanctum.
- Preparar o dockerfile e docker-compose.yml para esse projeto.
- Criado CRUD de Users.
- Adicionado diagrama de banco de dados aos docs do projeto.
- Criado CRUD de Authors.
- Criado CRUD de Books.
- Documentação da API gerado com Docblocks e com o Scribe.
- Criada coleção do Postman e do Insomnia na pasta Docs.
- Teste criados e controllers ajustados

### TODO
- ~~Criar CRUD de Users~~
- ~~Criar CRUD de Books~~
- ~~Criar CRUD de Authors~~
- ~~Configurar Docker no projeto~~
- ~~Construir coleção do PostMan para testes~~
- ~~Criar testes automatizados~~
- ~~Criar documentação da API~~
- Melhorar cobertura de testes

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
