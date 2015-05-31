#!/bin/bash

ROOT=/srv/khanovaskola.cz

function backup {
	rsync -a --password-file="$ROOT/rsync.pass" --inplace "$1" rsync://s10336@10336.s36.wedos.net/s10336/khanovaskola.cz
}

php "$ROOT/production/www/index.php" backup:create

FILE=$(ls "$ROOT/production/backups"/*.gz | tail -n 1)
mv "$FILE" "$ROOT/backups/"
backup "$ROOT/backups"

rm -rf data.tgz 2>/dev/null
tar cvjf data.tgz data >/dev/null
backup "$ROOT/data.tgz"
