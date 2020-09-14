# SoftMakers Contatos

Contact management web system.

Challenge proposed by [SoftMakers](https://github.com/BrSoftMakers/challenge-fullstack-developer) as a criterion for the selection process.

## Technologies

- [Laravel](https://laravel.com/)

Project made using [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) architecture.

## Getting started

Create a copy of `.env.example` file and name it `.env`, so fill it with the database credentials, like this

```
[...]

DB_CONNECTION=pg
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mydatabase
DB_USERNAME=myuser
DB_PASSWORD=mypassword

[...]
```

Install the dependencies by running the following commands:

```
composer install
```

Put your application key in the `.env` or generate a new one with this command:

```
php artisan key:generate
```

Run the database migrations

```
php artisan migrate
```

Finally, run the project

```
php artisan serve
```

Development server will be running in the [http://localhost:8000](http://localhost:8000)

## License

This project is MIT licensed.
