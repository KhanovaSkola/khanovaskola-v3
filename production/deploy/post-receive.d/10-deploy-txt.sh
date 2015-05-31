#!/bin/bash

out "Writing deploy.txt"

TXT="$TARGET/www/deploy.txt"
echo -e "Deployed $(date) by $GL_USER\n$REF_TO" > $TXT
cat "$TXT"
