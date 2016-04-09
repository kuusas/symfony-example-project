build:
	bin/console doctrine:schema:drop --force
	bin/console doctrine:schema:create
	bin/console doctrine:fixtures:load --no-interaction
	bin/console server:run
