#!/usr/bin/env bash
set -o errexit

# Installer les dépendances
composer install --no-dev --optimize-autoloader

# Exécuter les migrations
php artisan migrate --force

# Générer le cache de configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
