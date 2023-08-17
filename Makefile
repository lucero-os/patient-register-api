setup:
	@make build
	@make up
build:
	./vendor/bin/sail build --no-cache
	./vendor/bin/sail down -v 
up:
	./vendor/bin/sail up -d
down:
	./vendor/bin/sail down -v 
data:
	./vendor/bin/sail artisan migrate
