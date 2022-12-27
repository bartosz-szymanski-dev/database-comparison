#!/usr/bin/env bash

docker compose start
docker exec -it core-service /etc/init.d/nginx start -d
docker exec -it core-service /etc/init.d/php8.1-fpm start -d