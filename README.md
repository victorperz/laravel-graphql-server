<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

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


<!-- QUERY graphql -->

<!-- --- GET USERS ---
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
--- end --- -->

<!-- Mutaciones graphql  -->

<!-- --- createPost ---
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
 -->
