#!/usr/bin/env bash
#composer install --optimize-autoloader
php ./bin/console cache:warmup
php ./bin/console doctrine:migrations:status
php ./bin/console doctrine:migrations:migrate --no-interaction
chown -R nginx.nginx ./var/*
/start.sh