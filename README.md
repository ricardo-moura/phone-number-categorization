# Phone Number Categorization SPA

## Overview
Single page application to list and categorize country phone numbers.

## Technologies
- Laravel 9x;
- Docker with Laravel Sail;

## Installation:
1. Install [docker and docker-compose](https://docs.docker.com/get-docker/);
2. I'm using [Laravel Sail](https://laravel.com/docs/9.x/sail), for this reason run the following commands:
    - ```
        docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v $(pwd):/var/www/html \
            -w /var/www/html \
            laravelsail/php81-composer:latest \
            composer install --ignore-platform-reqs
      ```
        Note: More information about the command above could be found here: https://laravel.com/docs/9.x/sail#executing-composer-commands
