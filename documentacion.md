## Documentación

En las siguientes lineas estan los pasos para mantener en orden y funcionando el proyecto.
Para este proyecto estamos utilizando el framework de Laravek

## Hacer las bases de datos de los alumnos

** 1.- Creamos las tablas**

Para esto necesitamos leer, la siguiente documentación: [Configurar la base de datos y crear las tablas - Cristalab](http://www.cristalab.com/tutoriales/configurar-base-de-datos-y-crear-tablas-con-laravel-c111394l/) donde encontramos un resmunen de como configurar la base de datos y crear las tablas con control de versiones. [Migraciones de bases de datos - Laravel](http://laravel.com/docs/4.2/migrations) es la documentacion oficial para crear las tablas con laravel y controlar las versiones. [Constructor de las tablas -Laravel](http://laravel.com/docs/4.2/schema) documentación oficial para crear el esquema de nuestra tabla usando el Schema Builder.

### Usar los generadores

**Para usar los generadores facilitandonos la vida creando las tablas y modelos

Podemos crear modelos, vistas, migraciones con los [Generadores de JeffreyWay](https://github.com/JeffreyWay/Laravel-4-Generators)

*** 2.- Creamos las migraciones para las tablas**

 ```
php artisan generate:migration create_users_table
php artisan generate:migration create_subjects_table
php artisan generate:migration create_profiles_table
php artisan generate:migration create_ratings_table
 ```

** 3.- Construir las tablas con e [Schema Builder de Laravel](http://laravel.com/docs/4.2/schema)**

toca contruir las tablas en base a las migraciones son el schema. Al terminar ejecutar la migracion en consola
	
 ```
php artisan migrate
 ```
	
** El ORM de laravel relaciona las tablas como objetos, nos da que la Tabla = Clase y la Fila = Objeto**

Creamos los modelos con los generadores
 ```
php artisan generate:model Profile
php artisan generate:model Subject
php artisan generate:model Rating
 ```
 
 ** Creamos las tablas con datos, para eso estan los Seeds, tambien utilizamos los generadores**
 ```
php artisan generate:seed subjects
php artisan generate:seed profiles
php artisan generate:seed ratings
 ```
	
** Generar usuarios ficticios**
Los Seeds nos ayudan a crear los datos, otra vez usamos los generadores
Instalamos el [Faker con el manual de github](https://github.com/fzaninotto/Faker), [paquete Faker](https://packagist.org/packages/fzaninotto/faker). Luego corremos la actualizacion de laravel en la consola
 ```
composer update --dev
 ```

Construimos los seeders, y ejecutando en la terminal para llenar la tabla
 ```
php artisan db:seed
 ```
	
	
## Refactorizar el MVC en una aplicación

Crear la carpeta que contendra nuesta aplicación en este caso llamado "sicii"
Renombrar la carpeta "models" a "Entities" y moverlo dentro de la carpeta de la aplicacion "sicii", que se va a dedicar a trabajar con una fila o con un registro
Las consultas las va a hacer el "Repositories"
Los "Managers" se encargaran de validar y si es correcto va a guardar las entidades
	
Despues de estas modificaciones necesitamos los designar los namespaces
 ```
&lt;?php namespaces sicii\Entities;
 ```
Y lo llamamos de la sigiente maner
 ```
use sicii\Entities\User;
 ```
Le decimos a laravel en donde esta nuestra aplicacion y los namespaces
	
Modificamos el composer.json y en el autoload agregamos
		
 ```
"psr-4": {
	"Sicii\\": "app/Sicii"
}
 ```
		
Ejecutar en la terminal
 ```
composer dump-autoload
 ```

Estamos listos para empezar a programar.

## Crear la primera página dinámica

Definimos la ruta en `app/routes.php` 
 ```
Route::get('alumnos/{carrera}', ['as' => 'alumnos', 'uses' => 'AlumnosController@carrera']);
 ```

Podemos crear el controlador desde la consola
```
php artisan controller:make AlumnosController
```







