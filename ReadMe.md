# KenSwitch API

[![Build Status](https://travis-ci.org/andela-sakande/kenswitch.svg?branch=master)](https://travis-ci.org/andela-sakande/kenswitch)
[![Coverage Status](https://coveralls.io/repos/github/andela-sakande/kenswitch/badge.svg)](https://coveralls.io/github/andela-sakande/kenswitch)
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-sakande/PotatoORM/blob/master/LICENSE)

KenSwitch API is a RESTful API that consumes a Web Service.
## Usage

To download and use this project you need to have the following installed on your machine

- Composer
  Visit the [official website](https://getcomposer.org/doc/00-intro.md) for installation instructions.
- Laravel Valet
  Visit [Laravel website](https://laravel.com/docs/5.5/valet) for installation and setup instructions.

When you have completed the above processes, run:

```bash
$ git clone https://github.com/andela-sakande/kenswitch
`````
to clone the repository to your working directory. This step presumes that you have git set up and running.

Run

```bash
$ composer install
```
to pull in the project dependencies.

Also run on terminal
```bash
    php artisan migrate --seed
```
to configure your database.

Setup up a local webservice based on kenswitch.wsdl and add the URL to .env file e.g:
```bash
    WSDL=http://localhost:8088/mockIPayment_Binding?WSDL
```
Now you are set up and ready to run.

## API features
- Make Payment Request to Kenswitch Webservice
- Persist Transaction Responses.
- Transaction CRUD


## API Documentation

Visit [Postman Online Documentation](https://documenter.getpostman.com/view/693355/kenswitch/71FVqMq#85a02e91-9ba0-c9f9-61bd-b93921faef4f)

## Testing

``` bash
$ phpunit
```

## Credits

KenSwitch API is maintained by `Surajudeen AKANDE`.

## License

School is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.