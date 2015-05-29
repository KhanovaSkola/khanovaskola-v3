#!/bin/bash

out "Swapping symlinks"
unlink /srv/khanovaskola.cz/$BRANCH && \
	ln -s "$TARGET" /srv/khanovaskola.cz/$BRANCH
