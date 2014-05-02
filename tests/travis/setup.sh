#!/bin/sh

if [ "$TEST_SUITE" = "cs" ]
then
	exit 0
fi

echo "Installing ElasticSearch ICU plugin"
sudo /usr/share/elasticsearch/bin/plugin -install elasticsearch/elasticsearch-analysis-icu/2.1.0
sudo service elasticsearch restart

echo "127.0.0.1 travis.khanovaskola.cz" | sudo tee -a /etc/hosts

echo "Installing beanstalkd"
sudo apt-get install beanstalkd
beanstalkd -l 127.0.0.1 -p 13000 &

echo "Setting configuration"
cat tests/travis/php-custom.ini >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
rm tests/acceptance.suite.yml
mv tests/travis/acceptance.suite.yml tests/acceptance.suite.yml
cp tests/travis/config.local.neon app/config/config.local.neon
php tests/travis/decrypt.php

if [ "$TEST_SUITE" = "acceptance" ]
then
	echo "Starting local server"
	php -S travis.khanovaskola.cz:8000 -t www/ &
fi

echo "Waiting for all services to load"
sleep 10 # wait for all services to load
curl "http://localhost:9200/" # check elastic search

echo "Provisioning"
psql -c 'create database khanovaskola;' -U postgres
bin/console db:migrate
bin/console es:recreate
bin/console db:fill --testdata
