### Software Stack
- Docker 20.10.13
- PHP 8.2.3
- MySQL 8.1.0
- Laravel 11

### Base Settings
1. Run git clone
2. Run cp .env.example .env
3. Set up your settings in .env:
    - DOCKER_NGINX_PORT
    - DOCKER_USERNAME
    - DOCKER_USER_ID
4. Run docker compose up -d
5. Run docker exec -it bulls-media-app bash
6. Run composer install
7. Run php artisan key:generate
8. Run php artisan migrate
9. Go to nginx port, register user and follow instructions
