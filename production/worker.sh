#!/bin/bash

# This script is executed every minute by crontab.
# The tasks exit immediately if idle, otherwise they exit
# after the task has been completed.

cd /srv/sites/production.khanovaskola.cz
timeout --signal=TERM 58 php www/index.php ra:con mail &
timeout --signal=TERM 58 php www/index.php ra:con updateAvatar &
timeout --signal=TERM 58 php www/index.php ra:con updateSchema &
timeout --signal=TERM 58 php www/index.php ra:con updateVideo &
