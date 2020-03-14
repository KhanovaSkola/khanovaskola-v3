#!/bin/bash

# This script is executed every minute by crontab.
# The tasks exit immediately if idle, otherwise they exit
# after the task has been completed.
#
# If no task ever hit the consumer however, it does not
# handle the INT signal and we must kill it manually.


cd /srv/khanovaskola.cz/production

timeout --signal=INT 58 php www/index.php ra:con mail &
timeout --signal=INT 58 php www/index.php ra:con updateSchema &
timeout --signal=INT 58 php www/index.php ra:con updateVideo &
