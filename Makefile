up: build
	docker-compose up
build:
	docker-compose build
down:
	docker-compose down
prune:
	docker system prune -a