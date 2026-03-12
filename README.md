# Exam - API

## Empezando
Esta sección proporciona instrucciones sobre cómo configurar y ejecutar la API localmente.

### Prerrequisitos

- PHP8.4
- Composer (package manager for PHP)
- PostgreSQL database

### Instalación

1. Clonar el repositorio:

```
$ git clone https://github.com/juancarlospl7312/exam-api.git
```

2. Instalar dependencias

```
$ composer install
```

3. Configurar la conexión a la base de datos:

Editar el archivo .env para incluir sus credenciales de base de datos PostgreSQL:

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=[database name]
DB_USERNAME=[Your PostreSQL username]
DB_PASSWORD=[Your PostgreSQL password]

AUTH_GUARD=api
AUTH_PASSWORD_BROKER=users
```

4. Ejecutar migraciones de bases de datos

```
$ php artisan migrate
```

### Ejecución de la API

Iniciar el servidor:

```
$ php artisan serve
```



### Sobre la tarea

Instalé Laravel con composer:

```
$ composer create-project laravel/laravel exam-api
$ cd exam-api
```

Instalé Sanctum

```
$ composer require laravel/sanctum
```

Publiqué configuración (Esto me generó un archivo de migración para crear la tabla personal_access_tokens ):
```
$ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

Corrí migración nuevamente

```
$ php artisan migrate
```

Modifiqué el modelo User para que utilizara el HasApiTokens

Creé usuario y token utilizando Tinker:

```
$ php artisan tinker

$user = App\Models\User::create([
'name' => 'Admin',
'email' => 'admin@test.com',
'password' => bcrypt('password')
]);

$user->createToken('api-token')->plainTextToken;
```

Implementé la lógica del auth creando AuthController(Inyección de dependencias via constructor) y AuthService(contiene la lógica)

Creé los endpoints para login y logout

Creé migración subscribers:
```
$ php artisan make:model Subscriber -m
```
Agregando los campos: id, nombre, email (único) y
status (booleano) y corriendo las migraciones nuevamente.

Actualicé el modelo Subscriber

Creé el servicio SubscriberService en "app/Services" (logica del negocio)

Creé el Form Request para validar las entradas del usuario
```
$ php artisan make:request SubscribeRequest
```

Creé el controllador SubscriberController
```
$ php artisan make:controller Api/SubscriberController
```

Creé el endpoint principal POST /api/subscribe protegido por el middleware auth:sanctum.
