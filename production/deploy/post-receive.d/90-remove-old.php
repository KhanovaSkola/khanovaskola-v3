<?php

echo "Removing old deploys\n";
// rm everything but the 5 latest builds
run("ls -d1 /srv/deploy/{$branch}.khanovaskola.cz_* | sort -t_ -k2,2rn | awk \"NR>3\" | xargs rm -rf");
