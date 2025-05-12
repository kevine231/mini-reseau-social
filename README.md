# mini-reseau-social
 
## Commande

- créer un controller
 
```sh

php artisan make:controller /UserController --model=User --api

```

- Configurer laravel en api: executer la commande suivant
 
```sh

php artisan install:api

```

-Ensuite ajouter la ligne suivante dans le fichier boostrap/app.php pour charger le fichier routes/api.php dans la configuration
 
```sh

api: __DIR__.'/../routes/api.php', // loads the routes here.

```

Exemple

```sh

return Application::configure(basePath: dirname(__DIR__))

->withRouting(

web: __DIR__.'/../routes/web.php',

api: __DIR__.'/../routes/api.php', // loads the routes here.

commands: __DIR__.'/../routes/console.php',

health: '/up',

)

->withMiddleware(function (Middleware $middleware) {

//

})

->withExceptions(function (Exceptions $exceptions) {

//

})->create();

```

Pour creer un classe modele
 
```sh

php artisan make:model Project -m

```
 
