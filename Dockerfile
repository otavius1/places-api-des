FROM php:8.3-fpm

# Dependências básicas
RUN apt-get update && apt-get install -y \
    zip unzip curl libpq-dev git \
    && docker-php-ext-install pdo pdo_pgsql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurações PHP
COPY .docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Definir diretório padrão
WORKDIR /var/www

# Instalar dependências do Laravel
COPY . .
RUN composer install
 
CMD php artisan migrate --seed 

CMD  php artisan serve --host=0.0.0.0 --port=8000
