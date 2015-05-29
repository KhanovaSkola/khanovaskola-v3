#!/bin/bash

out "Running migrations"
php "$TARGET/www/index.php" migrations:migrate --no-interaction
