#!/usr/bin/env bash

# Run Laravel migrations and serve
php artisan migrate --force
php artisan serve --host 0.0.0.0 --port 10000

