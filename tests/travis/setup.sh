#!/bin/bash

set -e # exit on first erorr

if [ "$TEST_SUITE" = "cs" ]
then
	exit 0
fi

block() {
	php -r "echo \"\n\e[1;30;44m$1\e[21m\n\";"
}

block "Installing ElasticSearch ICU plugin"
sudo /usr/share/elasticsearch/bin/plugin -install elasticsearch/elasticsearch-analysis-icu/2.1.0
sudo service elasticsearch restart

block "Installing Neo4j"
wget -O - http://debian.neo4j.org/neotechnology.gpg.key| sudo apt-key add -
echo 'deb http://debian.neo4j.org/repo stable/' | sudo tee /etc/apt/sources.list.d/neo4j.list
sudo apt-get update -y
sudo apt-get install neo4j -y

echo '127.0.0.1 travis.khanovaskola.cz' | sudo tee -a /etc/hosts

block "Installing beanstalkd"
sudo apt-get install beanstalkd
beanstalkd -l 127.0.0.1 -p 13000 &

block "Setting configuration"
cat tests/travis/php-custom.ini >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
rm tests/acceptance.suite.yml
mv tests/travis/acceptance.suite.yml tests/acceptance.suite.yml
cp tests/travis/config.local.neon app/config/config.local.neon
php tests/travis/decrypt.php

if [ "$TEST_SUITE" = "acceptance" ]
then
	block "Starting local server"
	php -S travis.khanovaskola.cz:8000 -t www/ &
fi

block "Waiting for all services to load"
sleep 10 # wait for all services to load
curl "http://localhost:9200/" # check elastic search

block "Provisioning"
psql -c 'create database khanovaskola;' -U postgres
bin/console db:migrate
bin/console es:recreate
bin/console db:fill --testdata
