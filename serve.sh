#!/bin/bash

# start laravel server
php artisan serve &

# wait for few seconds
sleep 5

# open default browser
xdg-open http://127.0.0.1:8000
