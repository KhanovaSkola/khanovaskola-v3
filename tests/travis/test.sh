#!/bin/sh
if [ "$TEST_SUITE" = "unit" ]
then
	php -r 'echo "\n\n\e[1;30;44m Running UNIT tests \e[21m\n\n";'
	php vendor/bin/tester tests/unit/
else
	php -r 'echo "\n\n\e[1;30;44m Running ACCEPTANCE tests \e[21m\n\n";'
	php vendor/bin/codecept run acceptance
fi
