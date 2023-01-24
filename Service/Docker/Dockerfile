FROM php:8.1.14-alpine3.17
LABEL remove=true mantainer=sergeygardner@gmail.com

ARG PROJECT_ENV=prod
ENV PROJECT_ENV=$PROJECT_ENV

COPY --chown=www-data ./App/ /app/
COPY ./Service/php.d/ /usr/local/etc/php/conf.d/
COPY ./Service/run/ /run/

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apk upgrade && apk add bash && chmod +x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions mcrypt intl opcache bcmath pcntl pgsql pdo_pgsql \
    && env > /etc/environment

WORKDIR /app

CMD ["sh"]
