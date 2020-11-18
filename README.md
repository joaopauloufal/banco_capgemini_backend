# Banco Capgemini (Backend API)

[![GitHub release](https://img.shields.io/github/release/joaopauloufal/banco_capgemini_backend/all.svg)](https://api.github.com/repos/joaopauloufal/banco_capgemini_backend/StrapDown.js/releases/latest)

Tecnologias utilizadas:

- [Laravel 7.x](https://laravel.com).

Você pode acessar o respositório do Frontend do projeto [clicando aqui](https://github.com/joaopauloufal/banco_capgemini_frontend).

Procedimentos necessários para configurar e executar o projeto para o desenvolvimento:

- Acesse esse [link](https://laravel.com/docs/7.x) para as instruções de instalação das dependências do PHP.
- Após instalar as dependências, abra um console, navegue até a raiz do projeto e execute "composer install".
- Após a conclusão da instalação, execute "php artisan serve" (A API será executada em [http:localhost:8000](http:localhost:8000)).
- Para executar os testes (Feature e Unit) execute "vendor/bin/phpunit".
- O projeto usa o banco de dados SQLITE (Já incluso no respositório).
- Já existem contas cadastradas no banco de dados. Se precisar inserir mais contas para teste, execute "php artisan db:seed".
- Se o arquivo .env não for criado na instalação das dependências, execute "cp -r .env.example .env".
