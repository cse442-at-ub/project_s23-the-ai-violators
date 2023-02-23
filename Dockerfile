FROM php:8.0-cli

ENV HOME /app
WORKDIR /app

COPY . /app

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb


RUN apt-get update && apt-get install -y

CMD ["php", "database.php" ]
