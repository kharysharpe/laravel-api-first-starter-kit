# Laravel API First Starter Kit

Starting point for building API driven applications.
Includes sample tests for Users and Sessions (Authentication)

Built using:
* [Dingo API](https://github.com/dingo/api)
* [JSON Web Token Authentication for Laravel](https://github.com/tymondesigns/jwt-auth) 
* [Fractal](https://github.com/thephpleague/fractal)
* [Laravel API Documentation Generator](https://github.com/mpociot/laravel-apidoc-generator)
* [Tighten Co. Quicksand](https://github.com/tightenco/quicksand)

## Prerequisite

Install Composer

See https://getcomposer.org/ for more information

```
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer

```

Install NPM

See https://github.com/npm/npm OR https://www.npmjs.org/ for more information


## Setup 
Clone this repository into a folder `projectname`. Be sure to change projectname to your own project name.
```
$ git clone git@github.com:kharysharpe/laravel-api-first-starter-kit.git projectname
```

Remove git and intialize it as your own
```
$ cd projectname
$ rm -rf .git
$ git init
```

Install all NPM packages
```
$ npm install
```

Install all composer packages
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
* ? Add a console command to generate boilerplate
* ? Use queues by default for all requests (SOAesque)
* ? Create walk through 

## License

This starter kit is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
