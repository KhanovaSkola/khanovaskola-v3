#!/bin/bash

out "Linking data and caches"

function link {
	rm -rf "$2"
    ln -s "$1" "$2"
}

link "/srv/khanovaskola.cz/data/subs" "$TARGET/temp/subs"
link "/srv/khanovaskola.cz/data/blackboard" "$TARGET/www/data/blackboard"
link "/srv/khanovaskola.cz/data/preview" "$TARGET/www/data/preview"
