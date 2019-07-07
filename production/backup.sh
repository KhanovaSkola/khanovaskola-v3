#!/bin/bash

ROOT=/srv/khanovaskola.cz
PSSWD="$ROOT/../rsync_wedos_new10gb.pass"
USER=s26019
SERVER="26019.s19.wedos.net"

function backup {
    #rsync -a --password-file="$PSSWD" --inplace "$1" rsync://s10336@10336.s36.wedos.net/s10336/khanovaskola.cz
    rsync -a --password-file=$PSSWD --inplace "$1" rsync://$USER@$SERVER/$USER/khanovaskola.cz
}

php "$ROOT/production/www/index.php" backup:create > /dev/null

FILE=$(ls "$ROOT/production/backups"/*.gz | tail -n 1)
mv "$FILE" "$ROOT/backups/"
cp "$ROOT/dict.txt" "$ROOT/backups/"
backup "$ROOT/backups"
rm $ROOT/backups/*

rm -rf data.tgz 2>/dev/null
tar cvjf data.tgz "$ROOT/data" >/dev/null 2>&1
backup "$ROOT/data.tgz"
