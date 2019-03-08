# PHP 7.3
FROM wyveo/nginx-php-fpm:php73

RUN apt-get update
RUN apt-get install -y apt-utils libicu-dev zlib1g-dev wget

RUN apt-get install php7.3-mbstring php7.3-sqlite php7.3-intl php7.3-xdebug php7.3-zip php7.3-gd -y
RUN phpenmod pdo pdo_mysql mbstring intl zip

RUN wget -O composer https://getcomposer.org/download/1.8.3/composer.phar
RUN chmod +x composer && mv ./composer /bin

# WITH NODE JS
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

# SPECIFIC FOR CURRENT PROJECT
COPY ops/nginx.conf /etc/nginx/conf.d/default.conf
COPY ops/php.ini /usr/local/etc/php/conf.d/custom.ini

WORKDIR /var/www
COPY . .

RUN chmod +x ./ops/deploy.sh
ENTRYPOINT ["sh", "-c", "./ops/deploy.sh"]
