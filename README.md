<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Trippo API

This application's purpose is to manage the tourism sector in Syria.
It was developed using the Laravel framework as Api.


### TECHNOLOGY I USED
* [laravel 9](https://laravel.com/docs/9.x/releases)

* [laravel-media-library](https://spatie.be/docs/laravel-medialibrary)

* [laravel-query-builder](https://spatie.be/docs/laravel-query-builder)

* [laravel-permission](https://spatie.be/docs/laravel-permission)

* [jwt-auth](https://github.com/PHP-Open-Source-Saver/jwt-auth)

* [l5-swagger](https://github.com/DarkaOnLine/L5-Swagger)

* [blurhash](https://github.com/bepsvpt/blurhash)

* [google-translate-php](https://github.com/Stichoza/google-translate-php)

### Install
*  Make sure to create a new `.env` file, you can copy the content from `.env.example `
*  Make sure to create a new database and connect in `.env`
*  Run the following commands:
    ```shell script
    git clone https://github.com/MohamadRasoul/Trippo_laravel_api.git
    cd Trippo_laravel_api

    composer install

    php artisan migrate:fresh --seed

    php artisan serv

    php artisan l5-swagger:generate --all
    ```


### API Documentation
* [Link to API documentaion for Authentication.](http://localhost:8000/api/docs/auth)
* [Link to API documentaion for Dashboard.](http://localhost:8000/api/docs/dashboard)
* [Link to API documentaion for Mobile.](http://localhost:8000/api/docs/mobile)

