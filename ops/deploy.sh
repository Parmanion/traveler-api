#!/usr/bin/env bash
composer install $DEPENDANCIES_ENV --optimize-autoloader
./bin/console cache:warmup
./bin/console doctrine:migrations:migrate --no-interaction
chown -R nginx.nginx ./var/*
/start.sh