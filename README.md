# Meal delivery backend

# navigate to docker-compose file to :
sample "D:\wamp64\www\mealdelivery-backend\docker\docker-compose\docker-desktop" 
# Docker setup
## 1. Create and start container: docker-compose up -d --build
## 2. Log in to container using bash: docker exec -it --user=dev_user itsavirus_php-fpm bash

## 3. run composer install: composer install

## 4. Run migration database and seed database: php artisan migrate:fresh --seed
## 5. (Access to phpMyAdmin is http://127.0.0.1:8087)

## 6, Access to website: http://127.0.0.1:8086
