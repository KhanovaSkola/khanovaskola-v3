#!/bin/bash

out "Updating privileges"
chmod -R ug+rwx,o= "$TARGET"
chmod o+rx "$TARGET"
chgrp -R ks "$TARGET"
