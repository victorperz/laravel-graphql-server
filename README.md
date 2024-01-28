Desarrollar un servidor Laravel GraphQL 
Laravel 8  php 7.4.3 LARAGON

Crear proyecto
composer create-project --prefer-dist laravel/laravel:^8.0  laravel-graphql-server

Instalar paquete lighthouse (dependencia)
composer require nuwave/lighthouse

Instalar Laravel GraphQL Playground
composer require mll-lab/laravel-graphql-playground

Publicar el schema de lighthouse
php artisan vendor:publish --tag=lighthouse-schema

Autocompletar toda la informacion
composer require --dev haydenpierce/class-finder /// instalar la version anterior 0.4
composer require haydenpierce/class-finder:^0.4 --update-with-dependencies

php artisan lighthouse:ide-helper

crear una base de datos laravel_graphql_server y corremos las migraciones
php artisan migrate

Desplegamos la consolola de GraphQL en la ruta del proyecto :
http://laravel-graphql-server.test/graphql-playground

Crear 10 usuarios con tinker
php artisan tinker 
App\Models\User::factory(10)->create()

Crear migracion, factory y modelo post
php artisan make:model -mf Post
Crear migracion, factory y modelo Comment
php artisan make:model -mf Comment

Crear factory y relaciones ejecutar las migraciones
php artisan migrate:fresh --seed


QUERY graphql

--- GET USERS ---
{
  users{
    paginatorInfo{
      count
      currentPage
      hasMorePages
      lastPage
      perPage
      total
    }
    data{
      id
      name
      email
      posts {
        id
        title
        content
      }
    }
  }
}
--- end ---

--- GET COMMENTS ---

{
  comments{
    paginatorInfo{
      count
      currentPage
      hasMorePages
      lastPage
      perPage
      total
    }
    data{
      id
      reply
      post{
        title
        content
        author{
          id
          name
          email
        }
      }
    }
  }
}
--- end ---

--- GET USER ID ---

 {
  user(id: 1){
    name
    email
    created_at
    posts{
      id
      title
      comments{
        id
        reply
      }
    }
  }
}
--- end ---

Mutaciones graphql 

--- createPost ---
mutation{
  createPost(
    author_id:1,
    title:"Nuevo titulo regitrado new new",
    content:"hola k ase"){
    id
    title
    content
    author{
      id
      name
    }
  }
}
--- end ---

--- updatePost ---

mutation{
  updatePost(
    id: 32
    title: "Nuevo post id 32 actualizado a las 7:20"
    content:"Este es un nuevo contenido"
    author_id:7
  ){
    id
    title
    content
  }
}
--- end ---

--- deletePost ---
mutation{
  deletePost(id:1){
    id
		title
  }
}
--- end ---

