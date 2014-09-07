#!/bin/bash

set -e # exit on first error

block() {
	php -r "echo \"\n\e[1;30;44m$1\e[21m\n\";"
}

block "Setting hostname"
sudo hostname travis

block "Installing ElasticSearch ICU plugin"
sudo /usr/share/elasticsearch/bin/plugin -install elasticsearch/elasticsearch-analysis-icu/2.1.0
sudo service elasticsearch restart

block "Installing bc"
sudo apt-get install bc -y
bc --version

block "Installing beanstalkd"
sudo apt-get install beanstalkd -y
beanstalkd -l 127.0.0.1 &

block "Setting configuration"
cat tests/travis/php-custom.ini >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
cp tests/travis/config.local.neon app/config/config.local.neon
php tests/travis/decrypt.php

block "Waiting for all services to load"
sleep 10 # wait for all services to load
curl "http://localhost:9200/" # check elastic search

if [ "$TEST_SUITE" = "acceptance" ]
then
	block "Installing phantomjs, casperjs"
	npm install -g phantomjs
	npm install -g casperjs

	block "Starting local server"
	sudo php -S localhost:8000 -t www/ &
	sleep 1
fi

block "Provisioning"
psql -c 'create database khanovaskola;' -U postgres
php www/index.php m:m -i
php www/index.php m:m
php www/index.php elastic:recreate
