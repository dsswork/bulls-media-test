### Software Stack
- Docker 20.10.13
- PHP 8.2.3
- MySQL 8.1.0
- Laravel 11

### Base Settings
1. Run git clone https://github.com/dsswork/bulls-media-test.git
2. Run cd bulls-media-test
3. Run cp .env.example .env
4. Set up your settings in .env:
    - DOCKER_NGINX_PORT
    - DOCKER_USERNAME
    - DOCKER_USER_ID
5. Run docker compose up -d
6. Run docker exec -it bulls-media-app bash
7. Run composer install
8. Run php artisan key:generate
9. Run php artisan migrate
10. Go to nginx port, register user and follow instructions
