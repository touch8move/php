FROM php:7.1.11-apache-jessie
RUN set -e; \
  BUILD_PACKAGES="libzip-dev libssh2-1-dev"; \
  a2enmod headers proxy proxy_http ssl rewrite; \
  apt-get update; \
  apt-get install -y $BUILD_PACKAGES; \
  yes | pecl install ssh2-1.1.2; \
  docker-php-ext-install pdo_mysql mysqli zip; \
  docker-php-ext-enable ssh2; \
  apt-get remove --purge -y $BUILD_PACKAGES && rm -rf /var/lib/apt/lists/*; \
  apt-get clean;