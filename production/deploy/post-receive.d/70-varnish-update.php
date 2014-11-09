<?php

echo "Updating varnish definition\n";
$vclPath = "/etc/varnish/$branch.khanovaskola.cz.vcl";
run("rm -rf $vclPath");
run("ln -s $path/production/varnish.vcl $vclPath");
