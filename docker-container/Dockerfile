FROM php:7.2-apache

COPY src/ /var/www/html/
COPY infra/php/php.ini /usr/local/etc/php/conf.d/13_php_update.ini

WORKDIR /var/www/html/

RUN echo "adding git"
RUN apt-get -y update
RUN apt-get -y install git

RUN echo "adding composer"
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN echo "Labas is buildo"

ENV MYSQL_COOL=2