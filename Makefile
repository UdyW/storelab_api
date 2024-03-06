depend:
	docker run --rm -it -v $(pwd)/images/php:/app $(docker build -q .) composer create-project --prefer-dist laravel/lumen ./app

run_dev:
	docker-compose up --build -d

clean:
	docker-compose down