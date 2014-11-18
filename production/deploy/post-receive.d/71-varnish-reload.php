<?php

echo "Queuing varnish reload\n";
run('sudo /etc/init.d/varnish reload');
run('sudo /usr/bin/varnishadm -T 127.0.0.1:6082 -S /etc/varnish/secret "ban req.url ~ /"');
