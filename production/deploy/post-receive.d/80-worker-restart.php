<?php

$cmd = 'sudo /usr/local/bin/supervisorctl %s khanovaskola-beta-daemon';
$confPath = "/etc/supervisor/conf.d/{$branch}.khanovaskola.cz.conf";

echo "Stopping worker\n";
run(sprintf($cmd, 'stop'));

echo "Updating supervisor config\n";
run("unlink $confPath");
run("ln -s $path/production/supervisor.conf $confPath");
run('sudo /usr/local/bin/supervisorctl reread');

echo "Starting worker\n";
run(sprintf($cmd, 'start'));
