# AtManager
## _Gerenciamento de produtos_


[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)


Crie categorias, adicione items e confira os items salvos filtrando por categoria.

- Front End Stack => Vuejs
- Back End Stack => Lumen ( Microframework based Laravel)


## Features

- Criar nova Categoria
- Listar Itens a partir da seleção da Categoria desejada
- Crir Novos items para um categoria

### Steps para rodar o projeto
Clonar o projeto
Crir o env e instalar as dependencias do Lumen (Utilizndo mysql como database)
Rodar o projeto
Backend:
```sh
https://github.com/PedroPCardoso/atManager.git
cd AtManagerAdmin
nano .env
composer install
php artisan migrate
php -S localhost:8000 -t public   
```
front:
```sh
cd clientmanager
yarn install
yarn serve
```

## License

MIT