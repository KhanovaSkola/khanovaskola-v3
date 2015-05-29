#!/bin/bash

out "Removing old deploys"

# rm everything but the N latest builds
(cd /srv/khanovaskola.cz/stages/ && ls -1 | sort -t- -k3,3rn | awk "NR>3" | xargs rm -rf)
