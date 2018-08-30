FROM php:7.1-fpm
ARG HTTP_PROXY

ENV http_proxy=$HTTP_PROXY \
    https_proxy=$HTTP_PROXY \
    DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libgmp-dev \
        libxml2-dev \
        zlib1g-dev \
        libncurses5-dev \
        libldb-dev \
        libldap2-dev \
        libicu-dev \
        libcurl4-openssl-dev \
        libssl-dev \
        curl \
        make \
        git \
        wget \
        sudo \
        zlib1g-dev libicu-dev g++ \
        && docker-php-ext-configure intl \
        && docker-php-ext-install intl \
        && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/lib \
        && docker-php-ext-install mcrypt \
        && docker-php-ext-install gd \
        gmp \
        bcmath \
        mbstring \
        zip \
        pcntl \
        mbstring \
        pdo \
        pdo_mysql

### Install Xdebug
RUN wget http://xdebug.org/files/xdebug-2.5.5.tgz -e use_proxy=yes -e http_proxy=$http_proxy \
    && tar -xzvf xdebug-2.5.5.tgz \
    && cd xdebug-2.5.5 \
    && phpize \
    && ./configure \
    && make \
    && make install

RUN docker-php-ext-enable xdebug

## Set up composer enviroment
ENV PATH="/composer/vendor/bin:$PATH" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer \
    COMPOSER_VERSION=1.3.3

## Install composer
RUN curl -s -f -L -o /tmp/installer.php https://raw.githubusercontent.com/composer/getcomposer.org/da290238de6d63faace0343efbdd5aa9354332c5/web/installer \
 && php -r " \
    \$signature = '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410'; \
    \$hash = hash('SHA384', file_get_contents('/tmp/installer.php')); \
    if (!hash_equals(\$signature, \$hash)) { \
        unlink('/tmp/installer.php'); \
        echo 'Integrity check failed, installer is either corrupt or worse.' . PHP_EOL; \
        exit(1); \
    }" \
 && php /tmp/installer.php --no-ansi --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION} \
 && rm /tmp/installer.php \
 && composer self-update \
 && composer --ansi --version --no-interaction


## Installing Node.js
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt-get install -y nodejs

## Installing Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y yarn

# Create new USER
ENV HOME=/home/www-data \
    USER=www-data \
    GROUP=www-data

# Create the home directory for the new app user.
RUN mkdir -p $HOME

# Create an app user so our program doesn't run as root.
RUN adduser $USER sudo
RUN echo "$USER:$GROUP" | chpasswd
RUN echo "$USER ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
RUN chown -R $USER:$GROUP $HOME

## NPM user
RUN npm config set user www-data

# Permission fix
RUN usermod -u 1000 www-data

RUN mkdir -p /composer
RUN sudo chown -R $USER /composer

# Copy custom configuration
COPY php.ini /usr/local/etc/php/php.ini

# Configuration xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Затираем данные proxy auth
ENV http_proxy='' \
    https_proxy=''

CMD ["php-fpm"]
