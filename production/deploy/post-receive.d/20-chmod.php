<?php

echo "Updating privileges\n";
run('chmod -R ug+rwx,o= ' . escapeshellarg($path));
run('chmod o+rx ' . escapeshellarg($path));
run('chgrp -R web-ks ' . escapeshellarg($path));
