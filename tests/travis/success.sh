#!/bin/sh
if [ "$TEST_SUITE" = "cs" ]
then
	php -r 'echo "\n\n\e[1;30;44m Running additional CS tests \e[21m\n\n";'
	php vendor/bin/phpcs -p --severity=1 --standard=tests/cs app
fi
