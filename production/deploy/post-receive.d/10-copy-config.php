<?php

if (file_exists("/srv/sites/{$branch}.khanovaskola.cz/app/config/config.local.new.neon"))
{
	echo "Copying new config.local.neon\n";
	run("cp /srv/sites/{$branch}.khanovaskola.cz/app/config/config.local.new.neon " . escapeshellarg("$path/app/config/config.local.neon"));
}
else if (file_exists("/srv/sites/{$branch}.khanovaskola.cz/app/config/config.local.neon"))
{
	echo "Copying previous config.local.neon\n";
	run("cp /srv/sites/{$branch}.khanovaskola.cz/app/config/config.local.neon " . escapeshellarg("$path/app/config/"));
}
else
{
	echo "Creating empty config.local.neon\n";
	run('touch ' . escapeshellarg("$path/app/config/config.local.neon"));
}
