<?php

echo "Running migrations\n";
run('php ' . escapeshellarg("$path/www/index.php") . ' migrations:migrate --no-interaction');
