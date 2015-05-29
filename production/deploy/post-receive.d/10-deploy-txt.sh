#!/bin/bash

out "Writing deploy.txt"
echo "Deployed $(date) by $GL_USER" > "$TARGET/www/deploy.txt"
