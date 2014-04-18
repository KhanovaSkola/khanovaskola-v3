#!/bin/sh
if [ "$TEST_SUITE" = "unit" ]
then
	php -r 'echo "\n\n\e[1;30;44m Running UNIT tests \e[21m\n\n";'
	php vendor/bin/tester tests/unit/
elif [ "$TEST_SUITE" = "acceptance" ]
then
	php -r 'echo "\n\n\e[1;30;44m Running ACCEPTANCE tests \e[21m\n\n";'
	php vendor/bin/codecept run acceptance
elif [ "$TEST_SUITE" = "cs" ]
then
	php -r 'echo "\n\n\e[1;30;44m Running CS tests \e[21m\n\n";'
	php vendor/bin/phpcs -p --standard=tests/cs app
else
	php -r 'echo "\n\n\e[1;30;41m Unknown TEST_SUITE \e[21m\n\n";'
	exit 1
fi
