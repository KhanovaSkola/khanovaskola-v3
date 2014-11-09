<?php

$repoBase = getenv('GL_REPO_BASE');
$user = getenv('GL_USER');
list($from, $to) = Refs::getFromTo();
$from = substr($from, 0, 8);
$to = substr($to, 0, 8);
run("echo \"$user deployed khanovaskola/$branch $from...$to\" | /usr/bin/logger -t deploy");
