#!/bin/bash

out "Decrypting configuration files"

( cd "$TARGET" && blackbox_postdeploy )
mv "$TARGET/app/config/stages/production.neon" "$TARGET/app/config/config.local.neon"
