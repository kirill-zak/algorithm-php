.SILENT: help test
.DEFAULT_GOAL = help

test:
	./vendor/bin/phpunit --configuration ./tests/phpunit.xml

# Help
COLOUR_HEADER=\e[34;01m
COLOUR=\033[0;33m
END=\033[0m
help:
	printf "$(COLOUR)make test$(END)		full test of library\n"
