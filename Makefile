.SILENT: help test
.DEFAULT_GOAL = help

psalm:
	./vendor/bin/psalm --no-cache

parallel-lint:
	./vendor/bin/parallel-lint ./src

phpstan:
	./vendor/bin/phpstan analyse --level 9 src tests

unit-tests:
	./vendor/bin/phpunit --configuration ./tests/phpunit.xml

# Help
COLOUR_HEADER=\e[34;01m
COLOUR=\033[0;33m
END=\033[0m
help:
	printf "$(COLOUR)make psalm$(END)		run psalm for library\n"
	printf "$(COLOUR)make parallel-lint$(END)	run parallel-lint for library\n"
	printf "$(COLOUR)make phpstan$(END)		run phpstan for library\n"
	printf "$(COLOUR)make init-tests$(END)		full test of library\n"
