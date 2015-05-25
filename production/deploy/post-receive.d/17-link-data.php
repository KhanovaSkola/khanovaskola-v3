<?php

echo "Linking data\n";
run("rm -r " . escapeshellarg("$path/www/data/blackboard"));
run("ln -s /srv/data/blackboard " . escapeshellarg("$path/www/data/blackboard"));

run("rm -r " . escapeshellarg("$path/www/data/preview"));
run("ln -s /srv/data/preview " . escapeshellarg("$path/www/data/preview"));
