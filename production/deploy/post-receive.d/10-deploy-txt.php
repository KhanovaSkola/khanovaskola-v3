<?php

echo "Writing deploy.txt\n";
$out = "Deployed on " . date('Y-m-d H:i:s') . "\n";
$out .= Refs::getCommit() . "\n";
run('echo ' . escapeshellarg($out) . ' > ' . escapeshellarg("$path/www/deploy.txt"));
