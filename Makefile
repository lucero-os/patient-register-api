setup:
	@make build
	@make up
	@make autoload
	@make queue
build:
	./vendor/bin/sail build --no-cache
	./vendor/bin/sail down -v 
up:
	./vendor/bin/sail up -d
down:
	./vendor/bin/sail down -v 
data:
	./vendor/bin/sail artisan migrate
autoload:
	./vendor/bin/sail composer dumpautoload
	./vendor/bin/sail artisan dump-autoload
	./vendor/bin/sail artisan config:clear
queue:
	./vendor/bin/sail artisan queue:work
