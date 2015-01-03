<?php

echo "Copying subtitles\n";
run("rm -r " . escapeshellarg("$path/temp/subs"));
run("cp -r /srv/sites/{$branch}.khanovaskola.cz/temp/subs " . escapeshellarg("$path/temp/subs"));
