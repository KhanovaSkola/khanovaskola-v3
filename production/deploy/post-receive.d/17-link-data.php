<?php

echo "Linking data\n";
run("rm -r " . escapeshellarg("$path/www/data/blackboard"));
run("ln -s /srv/data/blackboard " . escapeshellarg("$path/www/data/blackboard"));
