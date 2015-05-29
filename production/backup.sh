#!/bin/bash

cd /srv/khanovaskola.cz/production/

php www/index.php backup:create

FILE=$(ls backups/*.gz | tail -n 1)
mv "$FILE" /srv/khanovaskola.cz/backups/
