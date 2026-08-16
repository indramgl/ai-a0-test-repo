FROM dunglas/frankenphp:1-php8.4-alpine

RUN install-php-extensions pdo_pgsql pgsql intl zip 

WORKDIR /app

COPY . /app
COPY Caddyfile /etc/caddy/Caddyfile

RUN composer install --no-dev --optimize-autoloader --prefer-dist \
    && php artisan optimize

EXPOSE 80 443

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
