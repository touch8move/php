FROM centos:7

RUN yum update -y && yum -y install epel-release.noarch yum-utils \
    && yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && yum-config-manager --enable remi-php70  \
    && yum install -y httpd php mariadb php-pear php-devel gcc re2c libssh2-devel php-mysql 
RUN pecl channel-update pecl.php.net \
    && pecl install ssh2-1.1.2

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# RUN chmod +x /usr/local/bin/install-php-extensions && \
    # install-php-extensions gd xdebug

# RUN chmod +x /usr/local/bin/install-php-extensions && \
    # install-php-extensions ssh2 pdo_mysql mysqli zip
    # && docker-php-ext-install pdo_mysql mysqli zip && docker-php-ext-enable ssh2
    # docker-php-ext-install 실패
    # 수동 설치로 전환