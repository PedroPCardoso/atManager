# AtManager
## _Gerenciamento de produtos_


[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)


Crie categorias, adicione items e confira os items salvos filtrando por categoria.

### Explicando a solução

O desafio deixa uma ideia de que as categorias seriam tabelas diferentes,e os atributos seriam especificados na hora da criação, uma solução para isso seria executar um eval por exemplo para criação da tabela no banco mas a criação de tabelas de forma manual direto no codigo não é algo recomendado e pode haver algumas falhas de segurança, como SQLInjection.

Para resolver o problema, foram criadas 2 tabelas para montar uma categoria, as tabelas são CategoryTemplate e AttributeTemplate, o nome é autoexplicativo e a relação é que uma categoria possui diversos AttributeTemplate.

No AttributeTemplate é possivel definir name,description,required. E no CategoryTemplate você pode definir nome e descrição da categoria.

Com o template de uma categoria criado, você pode adicionar um item a qualquer tabela criada, ao selecionar a tabela que deseja criar um novo item, os atributos relacionados serão apresentados assim como a descrição do que é cada um.

Também existe a opção de listagem, que carrega os items de determinada categoria e mostra numa tabela.


- Front End Stack => Vuejs
- Back End Stack => Lumen ( Microframework based Laravel)

Porque utilizar o Lumen ? 
O Lumen é um laravel simplificado, ele é indicado justamente para desenvolvimento de APIs RESTFul, pois por não ter todos os modulos do Laravel possui um desempenho/performace melhor, pois exemplo ele não vem preinstalado o blade, que não faria sentido num projeto com finalidade de Api.


## Features

- Criar nova Categoria
- Listar Itens a partir da seleção da Categoria desejada
- Crir Novos items para um categoria

### Steps para rodar o projeto
Clonar o projeto
Crir o env e instalar as dependencias do Lumen (Utilizando mysql como database)
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

## Melhorias que podem ser implementadas

- Login para entrar na plataforma
- Editar e Deletar items e categorias
- Testes Unitarios
- Barra de pesquisar em categorias
- Paginação dos items
- Aperfeiçoamento das querys, testar utilizando mysql ao invés do eloquent por exemplo.
- Organizar mais o front, criar o modulo API para utilizar onde for preciso as requests. Pensar melhor em como organizar os components para torna-los Views.

## License

MIT