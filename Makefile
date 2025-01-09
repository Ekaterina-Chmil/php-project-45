install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc.php:
	./bin/brain-calc.php

brain-gcd:
	./bin/brain-gcd

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

