#!/bin/bash

cd /srv/sites/production.khanovaskola.cz

php www/index.php backup:create

FILE=$(ls backups/*.gz | tail -n 1)
mv "$FILE" /srv/backups/production.khanovaskola.cz
