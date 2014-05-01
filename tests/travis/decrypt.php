<?php

#
# Update config.local.neon with decrypted ENV variables
# Usage: php decrypt.php
#

$file = __DIR__ . '/../../app/config/config.local.neon';
$content = file_get_contents($file);

$content = preg_replace('~(?<=appSecret:)(.*?)$~ims', ' ' . getenv('FB_SECRET'), $content);
$content = preg_replace('~(?<=clientSecret:)(.*?)$~ims', ' ' . getenv('GOOGLE_SECRET'), $content);
$content = preg_replace('~(?<=apiKey:)(.*?)$~ims', ' ' . getenv('GOOGLE_KEY'), $content);

file_put_contents($file, $content);
