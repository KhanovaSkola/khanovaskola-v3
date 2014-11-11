<?php

echo "Building frontend\n";
run('cd ' . escapeshellarg($path) . ' && gulp production');
