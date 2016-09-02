FROM php:7
RUN docker-php-ext-install pdo pdo_mysql && pecl install xdebug && docker-php-ext-enable xdebug
