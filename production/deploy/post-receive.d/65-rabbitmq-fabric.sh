#!/bin/bash

out "Setting up RabbitMq fabric"
php "$TARGET/www/index.php" rabbitmq:setup-fabric
