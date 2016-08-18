# Laravel API First Starter Kit

Starting point for building API driven applications.
Includes sample tests for Users and Sessions (Authentication)

Built using:
* [Dingo API](https://github.com/dingo/api)
* [JSON Web Token Authentication for Laravel](https://github.com/tymondesigns/jwt-auth) 
* [Fractal](https://github.com/thephpleague/fractal)
* [Laravel API Documentation Generator](https://github.com/mpociot/laravel-apidoc-generator)
* [Tighten Co. Quicksand](https://github.com/tightenco/quicksand)

## Setup
```
$ npm install
```

```
$ composer install
```

Duplicate sample .env, edit the file to match your database and other settings
```
$ cp .env.example .env
```

Generate Keys
```
$ php artisan key:generate
$ php artisan jwt:generate
```

## Development
TDD (only runs tests in @group tdd) see tests/UserTest.php
```
$ gulp watch
```

## Generating API docs
See public/docs/index.html
```
$ php artisan api:generate --router="dingo" --routePrefix="v1" --bindings="id,3"
```

Parking Lot:
* Add tests for forgot password, reset password etc
* ? Make JSON API compliant using https://github.com/tobscure/json-api 
* ? Use queues by default for all requests (SOAesque)
* ? Create walk through 

## License

This starter kit is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
