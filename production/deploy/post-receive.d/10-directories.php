<?php

echo "Creating directories\n";
run('mkdir -p ' . escapeshellarg("$path/log"));
run('mkdir -p ' . escapeshellarg("$path/tmp/cache"));
