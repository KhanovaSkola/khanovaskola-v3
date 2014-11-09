<?php

echo "Swapping symlinks\n";
run("unlink /srv/sites/{$branch}.khanovaskola.cz && " .
	"ln -s " . escapeshellarg($path) . " /srv/sites/{$branch}.khanovaskola.cz");
