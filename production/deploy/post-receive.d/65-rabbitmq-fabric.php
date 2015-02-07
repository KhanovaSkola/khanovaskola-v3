<?php

echo "Setting up RabbitMq fabric\n";
run('php ' . escapeshellarg("$path/www/index.php") . ' rabbitmq:setup-fabric');
