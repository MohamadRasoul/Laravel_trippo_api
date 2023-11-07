<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



# Trippo API

This application's purpose is to manage the tourism sector in Syria.
It was developed using the Laravel framework as Api.



## Table of Contents

- [ERD (System Analysis)](#ERD-(System-Analysis))
- [TECHNOLOGY USED](#technology-used)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [API Documentation](#api-documentation)
- [API Online Documentation](#api-online-documentation)




## ERD (System Analysis)
* [Link For ERD](https://drive.google.com/file/d/1vECQYHMuVvdXJagBGJBfsOhd3OLF76NH/view)


## Technology Used
* [laravel 9](https://laravel.com/docs/9.x/releases)

* [laravel-media-library](https://spatie.be/docs/laravel-medialibrary)

* [laravel-query-builder](https://spatie.be/docs/laravel-query-builder)

* [laravel-permission](https://spatie.be/docs/laravel-permission)

* [jwt-auth](https://github.com/PHP-Open-Source-Saver/jwt-auth)

* [l5-swagger](https://github.com/DarkaOnLine/L5-Swagger)

* [blurhash](https://github.com/bepsvpt/blurhash)

* [google-translate-php](https://github.com/Stichoza/google-translate-php)

## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP (>= 8.0)
- Composer
- A web server (e.g., Apache, Nginx)
- MySQL or another database of your choice


## Installation

1. Clone the repository:
    ```shell script
    git clone https://github.com/MohamadRasoul/Trippo_laravel_api.git
    ```


2. Navigate to the project folder:
    ```shell script
    cd Trippo_laravel_api
    ```

3. Install PHP dependencies using Composer:
    ```shell script
    composer install
    ```


4. Copy the `.env.example` file to `.env`:
    ```shell script
    cp .env.example .env
    ```

5. Generate an application key:
    ```shell script
    php artisan key:generate
    ```

6. Generate secret key for JWT:
    ```shell script
    php artisan jwt:secret
    ```

7. Configure your `.env` file with your database credentials and other settings.

8. Migrate and seed the database:
    ```shell script
    php artisan migrate --seed
    ```


## API Documentation
* [Link to API documentaion for Authentication.](http://localhost:8000/api/docs/auth)
* [Link to API documentaion for Dashboard.](http://localhost:8000/api/docs/dashboard)
* [Link to API documentaion for Mobile.](http://localhost:8000/api/docs/mobile)



## API Online Documentation
* [Link to API documentaion for Authentication.](https://trippo.mohamad-rasoul.website/api/docs/auth)
* [Link to API documentaion for Dashboard.](https://trippo.mohamad-rasoul.website/api/docs/dashboard)
* [Link to API documentaion for Mobile.](https://trippo.mohamad-rasoul.website/api/docs/mobile)


