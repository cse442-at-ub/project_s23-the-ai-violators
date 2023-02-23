FROM php:8.0-cli

ENV HOME /app
WORKDIR /app

COPY . /app

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

CMD ["php", "database.php"]

