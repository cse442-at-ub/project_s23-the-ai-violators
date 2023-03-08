FROM mcr.microsoft.com/devcontainers/php:0-8.2

ENV IN_DOCKER yes

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.2.1/wait /wait
RUN chmod +x /wait


RUN docker-php-ext-install mysqli

RUN /wait
