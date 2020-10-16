#!/bin/bash

out "Reloading php5-fpm"
sudo systemctl reload php7.1-fpm.service
