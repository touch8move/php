FROM php:7.0.33-fpm-jessie
# COPY Daum.repo  /etc/yum.repos.d/Daum.repo
RUN apt-get update && apt-get install -y php-mysql libzip-dev libssh2-1 libssh2-1-dev\
  && yes | pecl install ssh2-1.1.2 \
  docker-php-ext-install pdo_mysql mysqli zip && docker-php-ext-enable ssh2 \

# ENTRYPOINT ["/usr/sbin/httpd", "-D", "FOREGROUND"]