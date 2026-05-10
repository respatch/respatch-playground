#!/bin/bash

# Prejdeme do rootu projektu
cd "$(dirname "$0")/.."

echo "Zastavujem messenger consumerov (ak bežia)..."
php bin/console messenger:stop-workers --env=dev --quiet || true

echo "Zhadzujem schému..."
php bin/console doctrine:schema:drop --env=dev --force --full-database --no-interaction

echo "Vytváram schému..."
php bin/console doctrine:schema:create --env=dev --no-interaction

echo "Načítavam Fixtures..."
php bin/console doctrine:fixtures:load --env=dev --no-interaction

echo "Databáza bola úspešne resetovaná a naplnená demo dátami!"
