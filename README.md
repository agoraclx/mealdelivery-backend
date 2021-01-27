# Meal delivery backend

## navigate to docker-compose file:
~~~
sample "D:\wamp64\www\mealdelivery-backend\docker\docker-compose\docker-desktop" 
~~~
## Docker setup
### Create and start container: 
~~~
docker-compose up -d --build
~~~
### Log in to container using bash: 
~~~
docker exec -it --user=dev_user itsavirus_php-fpm bash
~~~

### run composer install:
~~~
composer install
~~~

### first check your mysql ip container in docker using:
~~~
docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)
eq: /itsavirus_mysql - 172.19.0.2
~~~

### edit .env file with: 
~~~
DB_HOST=172.19.0.2
DB_PORT=3306
DB_DATABASE=db_itsavirus
DB_USERNAME=dev_user
DB_PASSWORD=dev_pass
~~~

### Run migration database and seed database: 
~~~
php artisan migrate:fresh --seed
~~~
### Access to phpMyAdmin:
~~~
http://127.0.0.1:8087
~~~

## Access to website:
~~~
http://127.0.0.1:8086

Docker api localhost:
http://127.0.0.1:8086/api/restaurants

api online:
https://limitless-plains-59505.herokuapp.com/api/restaurants
~~~
