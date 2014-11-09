<?php

echo "Queuing varnish reload\n";
run('sudo /etc/init.d/varnish reload');
